---
title:  "Reactive Observing in Swift"
layout: post
---

Recently I've been discussing app architecture a lot with colleagues. As ever so often, our main question was: How do we propagate information from the bottom of the hierarchy to the top?

Delegates came up and where quickly dismissed. Notifications came up and where quickly dismissed. Closures came up and were embraced. Functional stuff is all the craze. For good reasons.

We looked at different Reactive/Redux frameworks: Reactive Swift, Reactive Kit, ReSwift, RxSwift.

To be honest, I was a bit overwhelmed by all the new terms around old ideas and old terms for new applications: observable, reducer, aspect, signal, signal producer, variable, stream, cancelable, disposable, dispose bag, event emitter, source, sink...

I also got obsessed with callback mechanisms in general and in Swift. As a method of exploring and learning, I wrote three fundamental primitives for reactive swift programming, which are solid, simple, sufficient and sweet for my own taste. They also compensate for what I didn't like about common implementations.

I guess I aimed at usability, readability, simplicity, safety and flexibility: [Checkout SwiftObserver on Github](https://github.com/flowtoolz/Flowtoolz/tree/master/Code/swift/SwiftObserver/). It's a foundational, flexible, non-intrusive, "use and forget" tool for reactive programming with observable variables and observable objects.

What follows is basically the github readme, highlighting benefits and use.

## Keep It Simple Sweety

* No need to learn a bunch of concepts or types. Observers observe objects and variables. That's it.
* Just readable code:

```
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
```

## The Easiest Memory Management

* There are no Disposables, Cancelables, Tokens, DisposeBags etc to handle. Simply call `stopAllObserving()` on an observer, and its references are removed from all observable objects and variables:

~~~
class Controller: Observer
{
   deinit
   {
      stopAllObserving()
   }
}
~~~

* Although you don't need to handle "disposables" or tokens after adding an observer, all objects are internally hashed, so performance is never an issue.

## You Don't Need to Implement Shit

* Observed classes don't have to implement anything to be observable. They just need to adopt the `Observable` protocol and declare their event type:

~~~
class Model: Observable
{
   typealias Event = String
}
~~~

* Because a `Variable` is `Codable`, objects composed of observable variables are still automatically encodable and decodable in Swift 4, simply by adopting the `Codable` protocol:

~~~
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
* Unlike established Swift implementations of the Redux approach, [SwiftObserver.swift](https://github.com/flowtoolz/Flowtoolz/tree/master/Code/swift/SwiftObserver/) lets you freely model your domain-, business- and view logic with all your familiar design patterns and types. There are no restrictions on how you organize and store your app state.
* Unlike established Swift implementations of the Reactive approach, [SwiftObserver.swift](https://github.com/flowtoolz/Flowtoolz/tree/master/Code/swift/SwiftObserver/) lets you in control of the ancestral tree of your classes. There is not a single class that you have to inherit. Therefore, all your classes can be directly observed, even views and view controllers.
* There are no protocols that you have to implement. Your code remains focused and decoupled. Because there are no delegate protocols, there is no limit to how many things an observer can observe or to how many observers a thing can have.
* Observable classes don't need to be generic, and yet every class can declare the specific type of event that it emits. Events are fully typed, and each class decides when to send which:

~~~
class Model: Observable
{
   deinit
   {
      updateObservers(.willDeinit)
   }

   typealias Event = ModelEvent

   enum ModelEvent
   {
      case didRequestData, didUpdate, willDeinit
   }
}
~~~

## All You Need

... to deal with are two interfaces and one class.

An observer should adopt the `Observer` protocol. That allows the observer to ...

* observe objects that implement the `Observable` protocol.
* observe objects of class `Variable<Value>`.

`Observable` classes need to declare their event type like `typealias Event = String` and send events of type `Event` like `updateObservers(event)`.

`Variable` objects send an update upon starting observation as well as whenever their value changes as result of a call like `variable.value = 7`.

### Memory Management

Before being deinitialized, observers should make sure to remove themselves from all objects they observe. The easiest way to achieve that is to call `stopAllObserving()` in `deinit`.

Observers can also stop observing single objects with `stopObserving(object)`. Or call `removeAllObservers()` on an `Observable` or `Variable`.

### Observer

```
protocol Observer: AnyObject
{
   func observe<O: Observable>(_ observable: O,
                             update: @escaping (O.Event?) -> ())

   func stopObserving<O: Observable>(_ observable: O)

   func observe<Value>(_ property: Variable<Value>,
                     update: @escaping (Value?, Value?) -> ())

   func stopObserving<Value>(_ property: Variable<Value>)

   func stopAllObserving()
}
```

### Observable

```
protocol Observable: AnyObject
{
   func add(_ observer: AnyObject, update: @escaping Update)

   func remove(_ observer: AnyObject)

   func removeAllObservers()

   func updateObservers(_ event: Event?)

   typealias Update = (_ event: Event?) -> ()

   associatedtype Event: Any
}
```

### Variable

```
class Variable<Value: Codable & Equatable>: Codable
{   
   public init(_ initialValue: Value? = nil)

   public func add(_ observer: AnyObject, update: @escaping Update)

   func remove(_ observer: AnyObject)

   func removeAllObservers()

   public var value: Value?

   typealias Update = (_ old: Value?, _ new: Value?) -> ()
}
```
