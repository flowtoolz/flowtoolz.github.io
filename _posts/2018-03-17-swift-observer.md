---
title:  "Reactive Observing in Swift"
layout: post
---

Recently I've been discussing app architecture a lot with colleagues. As ever so often, our main question was: How do we propagate information from the bottom of the hierarchy to the top?

Delegates came up and where quickly dismissed. Notifications came up and where quickly dismissed. Closures came up and were embraced. Functional stuff is all the craze. For good reasons.

We looked at different Reactive/Redux frameworks: Reactive Swift, Reactive Kit, ReSwift, RxSwift.

To be honest, I was a bit overwhelmed by all the new terms around old ideas and old terms for new applications: observable, reducer, aspect, signal, signal producer, variable, stream, cancelable, disposable, dispose bag, event emitter, source, sink...

I also got obsessed with callback mechanisms in general and in Swift. As a method of exploring and learning, I wrote two fundamental primitives for reactive swift programming, which are solid, simple and sweet to my own taste. They also compensate for what I didn't like about common implementations.

I guess I aimed at usability, readability, simplicity, safety and flexibility: [Checkout SwiftObserver on Github](github.com/flowtoolz/flowtoolz.git/tree/master/Code/swift/SwiftObserver/). It's a foundational, flexible, non-intrusive, "use and forget" tool for reactive programming with observable variables and observable objects.

What follows is basically the github readme, highlighting benefits and use.

## Keep it Simple Sweety

* No need to learn a bunch of concepts or types. Observers observe objects and variables. That's it.
* Just readable code:

~~~Ruby
controller.observe(model)
{ 
	event in
	
	// respond to event
}

controller.observe(model.variable)
{
	oldValue, newValue in

	// respond to value change
}
~~~

## The Easiest Memory Management

* There are no Disposables, Cancelables, Tokens, DisposeBags etc to handle. Simply call `stopAllObserving()` on an observer, and its references are removed from all observable objects and variables:

~~~Swift
class Controller: Observer
{
	deinit
	{
		stopAllObserving()
	}
}
~~~

* Even if you forget to call `stopAllObserving()`, most likely no real memory leaks occur because internal observer relationships get pruned at every opportunity.
* Although you don't need to handle "disposables" or tokens after adding an observer, all objects are internally hashed, so you can scale up as fuck.

## You Don't Need to Implement Shit

* Observed classes don't have to implement anything to be observable. They just need to adopt the `Observable` protocol and declare their event type:

~~~Swift
class Model: Observable
{
	typealias Event = String
}
~~~

* Because observable variables are `Codable`, objects composed of observable variables are still automatically encodable and decodable in Swift 4, simply by adopting the `Codable` protocol:

~~~Swift
class Model: Codable
{
	var variable = Variable<Int>()
}

let model = Model()

if let modelData = try? JSONEncoder().encode(model)
{
	print(String(data: modelData, encoding: .utf8))
}
~~~

## Focus On Meaning Not On Technicalities

* Because classes have to implement nothing to be observable, you can keep model and logic code independent of any observer frameworks and techniques. If the model layer had to be stuffed with heavyweight constructs just to be observed, it would become a technical issue instead of an easy to change,  meaningful, direct representation of domain-, business- and view logic.
* Unlike established Swift implementations of the Redux approach, we let you freely model your domain-, business- and view logic with all your familiar design patterns and types. There are no restrictions on how you organize and store your app state.
* Unlike established Swift implementations of the Reactive approach, we let you in control of the ancestral tree of your classes. There is not a single class that you have to inherit. Therefore, all your classes can be directly observed, even views and view controllers.
* There are no protocols that you have to implement. Your code remains focused and decoupled. Because there are no delegate protocols, there is no limit to how many things an observer can observe or to how many observers a thing can have.
* Observable classes don't need to be generic, and yet every class can declare the specific type of event that it emmits. Events are fully typed, and each class decides when to send which: 

~~~Swift
class Model: Observable
{
	deinit
	{
		updateObservers(.willDeinit)
	}
	
	typealias Event = ModelEvent
	
	enum ModelEvent: String
	{
		case didRequestData, didUpdate, willDeinit
	}
}
~~~