---
title: "SwiftObserver: Elegant Reactive Observing in Swift"
layout: post
excerpt: "Fundamental primitives for observing in Swift as a no BS approach to reactive programming. Stupid easy, safe, clean, readable, flexible, non-intrusive, sweet."
image_url: /blog-images/software-development/reactive-swift-programming/pyramid.jpeg
keywords: swift, observer, observer pattern, observable, architecture, software architecture, reactive, reactive programming, callback, redux, programming, clean code, rxswift, reswift, reactive swift, reactive kit, apple, design pattern, software development, github
---

<img style="margin-left:auto;margin-right:auto;display:block;" src="/blog-images/software-development/reactive-swift-programming/pyramid.jpeg" width="100%">

<i>Care about the code? Jump over to [SwiftObserver on Github](https://github.com/codeface-io/SwiftObserver).</i>

Recently I've been discussing app architecture a lot with colleagues. As ever so often, our main question was: How do we propagate information from the bottom of the hierarchy to the top?

Delegates came up and where quickly dismissed. Notifications came up and where quickly dismissed. Closures came up and were embraced. Functional stuff is all the craze. For good reasons.

We looked at different Reactive/Redux frameworks: Reactive Swift, Reactive Kit, ReSwift, RxSwift.

To be honest, I was a bit overwhelmed by all the new terms around old ideas and old terms for new applications: observable, reducer, aspect, signal, signal producer, variable, stream, cancelable, disposable, dispose bag, event emitter, source, sink...

However, I got obsessed with callback mechanisms in general and in Swift in particular.

As a method of exploring and learning, I wrote three fundamental primitives for reactive Swift programming, which are solid, simple, sufficient and sweet for my own taste.

This compact library also compensates for what I didn't like about common implementations. I guess I aimed at usability, readability, simplicity, safety and flexibility.

[Checkout SwiftObserver on Github](https://github.com/codeface-io/SwiftObserver). You can read the text there as the continuation of this article.
