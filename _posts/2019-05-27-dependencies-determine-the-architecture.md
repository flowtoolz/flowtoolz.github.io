---
title: "Law #1: Dependencies Determine the Architecture"
layout: post
excerpt: "The 1st of presumably 7 laws of software architecture discusses dependence as the universal force that determines code structure."
image_url: /blog-images/software-development/architecture/dependence/zen-stack.jpg
keywords: software architecture, software, architecture, zen, code quality, software quality, book, software development, architecture pattern, design pattern, productivity, philosophy, dependence, object-oriented design
---

<img style="margin-left:auto;margin-right:auto;display:block;" src="/blog-images/software-development/architecture/dependence/zen-stack.jpg" title="{{ page.title }}" alt="{{ page.title }}. {{ page.keywords }}">

<i>As this book draft as a whole keeps evolving, I had to prune the [intro to this series](/2019/01/14/zen-in-the-art-of-software-architecture-introduction.html) and it got a lot shorter. Some of the previous material will reappear in this and future posts. Last edit: May 27, 2019</i>

In the following, we derive *Law #1: Dependencies Determine the Architecture*. As all our laws rely upon the previous ones, this is the most fundamental of them all. We first develop a notion of *software architecture* and then bring *dependencies* into the picture.

## Is Architecture for Buildings? 

*Software architecture* is a fuzzy term and we'll deconstruct it anyway, so let's not get bogged down by "definitions". Instead, let's build upon our intuitive understanding and address common misconceptions.

In the realm of software, architecture is, first and foremost, a metaphor. It's a useful one. But, like any metaphor, you can take it to a point where it breaks down. Its applicability is limited and depends on what aspects we want to illuminate.

One aspect in which the metaphor fails software is this: Real world construction requires [up front design](https://en.wikipedia.org/wiki/Big_Design_Up_Front) while software can evolve organically. The software architect can quickly build a working product and then iterate over it again and again. It's like starting with a small hut, with no windows, plumbing or electricity, and then growing that hut, step by step, into a futuristic complex.

![](/blog-images/software-development/architecture/dependence/construction-vs-iteration.png)

Another mismatch worth remembering is that architecture of buildings involves the aesthetics they present to the end customer. In that sense, it is artistic and subjective. What interests us about software architecture is neither artistic nor subjective.

In some aspects, the metaphor is valid: Architecture relates to the structure of the end product. It's supposed to meet functional and non-functional requirements. And it must accord with natural laws.

For buildings, those natural laws are the laws of physics. For software, noone has really articulated them. Common patterns and principles suggest that there are some fundamental insights buried within our best practices. It seems we're already half-conscious of the laws of code. Throughout this book, we'll attempt to excavate them.

## Architecture Pattern Recognition

A central misconception is that "architectural" patterns and principles target the appropriate level of analysis, the "big picture". In reality, they often only touch the surface. We can think more deeply than that. And we should because, as they say, you can't solve a problem at the same level at which it occurs.

So, in daily practice, we feel we have an intuition of what "clean" design, proper "engineering" and "elegant" solutions would look like. But **what we think is optimal or what feels beautiful isn't necessarily that by the intrinsic standards and true nature of the subject matter**.

Often, we cling to some so called "architecture" without really knowing why. **Compliance with an architecture pattern yields consistency and beauty in terms of that pattern but not necessarily in terms of the nature of software itself.**

[Model-View-Presenter](https://en.wikipedia.org/wiki/Model–view–presenter), for instance, is not an architecture. It's a subjective observation, a simplified model of reality, a perceived pattern:

![](/blog-images/software-development/architecture/dependence/mvp.jpg)

**Concepts like MVP, MVC, MVVM and VIPER are more descriptive than normative. They describe patterns that emerge in effective architectures. But they're never the true basis or cause for effective architecture.**

There are myths in our field that we've conjured up through blind adherence to observed patterns. But **when you turn an observation into a dogma, you've lost the way**.

Here are just some of those **myths**:

- Views must not access models
- Ideally, all code should be functional (spoiler: it can't be and it shouldn't)
- The functional core of an app resides in the model
- Everything must be unit-tested
- Independence is for re-usability
- The "model" is the state of the application
- Singletons are bad
- Views must have no behaviour
- View controllers are the only acceptable "controller" type
- The view-model layer is only for output
- Different "architectures" are mutually exclusive

We won't challenge them directly. But when we're able to put such ideas in perspective and understand where they come from, they appear small-minded, arbitrary, over-restrictive, superficial and needlessly confusing.

## Product, Process, Principles

So, if architecture patterns aren't architecture, then what is? Let's start at the beginning. Every type of productivity involves these layers:

![](/blog-images/software-development/architecture/dependence/product-process-principles.jpg)

Here is what they mean in our context:

1. The **product** is the ultimate outcome. The product of *software architecture* is software - not "architecture".
2. The **process** produces the product with respect to the principles. It is the dynamic activity (or negligence) of the architect. 
3. The **principles** describe the domain of production, its entities and rules. They're the science of the materials and building blocks the architect has to work with. The basic material of *software architecture* is code.

### Product

Note, that our approach applies to everything made of code, independent of the underlying hardware-structure. Technical *system architecture* is a different subject. So you may have any type of software in mind: A highly distributed system, a microservice, a mobile app, a web service, whatever you're doing.

![](/blog-images/software-development/architecture/dependence/program-code.jpg)

Now, **the gobal high-level code structure that we commonly call "architecture" describes what holds a particular software product together and what makes it a *thing* at all**. It's a level of analysis applicable to any product, even if the product wasn't designed at that level.

### Principles

**Principles, on the other hand, are the natural laws that govern the universe in which the product arises. They determine what can possibly manifest as a stable entity.**

![](/blog-images/software-development/architecture/dependence/blackboard-equations.jpg)

Everything exists as a consequence of such laws and only as far as it is in accordance with them. As far as something disintegrates, it is obviously, as a *thing*, not in accordance with the laws of its universe.

**Our notion of *architecture* includes a core of universal principles in addition to the product structure to which they apply**: To grow into a healthy long-lived human being, we must design our lifestyle in accordance with *the architecture of human existence*. To grow a healthy long-lived code base, we must design it in accordance with *the architecture of code*.

Before we proceed, you might be wondering what Uncle Bob has to say about all this. How do his famous principles fit into the picture?

## The Role of Uncle Bob's Principles

[Robert C. Martin (a.k.a. Uncle Bob)](https://blog.cleancoder.com) is not just a pioneer of the agile and craftsmanship movements, he also laid a foundation for methodical software architecture. His [11 principles of class and package design](https://web.archive.org/web/20150906155800/http://www.objectmentor.com/resources/articles/Principles_and_Patterns.jpg) are profound and have vast implications on code structure.

![](/blog-images/software-development/architecture/dependence/robert-martin-uncle-bob.jpg)

**While Uncle Bob is a legend among developers, most do not know, let alone apply, the principles he repeatedly wrote about since first publishing them more than two decades ago. As true software craftsmen, our thinking should revolve around such essential timeless principles, instead of the ephemeral (and by themselves meaningless) technical details of the latest technologies.**

We'll cover the wisdom of all of Uncle Bob's principles and more. However, we approach it from a different perspective, in our own terms, less as a list of abstract definitions and more integrated into a meaningful learning process.

Our line of reasoning leads to results that contain abstractions of Uncle Bob's principles. We'll also present some explicit arguments for why certain generalizations of those principles make sense.

Most importantly, **the laws we deduct do not parcel out classes or packages. Instead, they apply to all code artifacts at all scales, from functions to large sub-systems**. This also means we **should** apply them at all scales because conforming to a law at one level, say at the class level, does not guarantee conformance at others, like at the package level.

As far as this book conveys the ideas of Uncle Bob's principles, it provides an additional access to their essence. **Getting a feel for underlying reasons has a bigger impact on practice and is more profoundly valuable than just knowing a list of Dos and Don'ts.**

## Code Artifacts

If *software architecture* roots in a set of laws that naturally apply to all code, then what are these laws? Let's narrow down the first one!

![](/blog-images/software-development/architecture/dependence/building-blocks-of-life.jpg)

The natural laws of life relate to its structure. Structure is defined by *structural elements* and the *relationships* between them. The elements of life are atoms, organic compounds, peptides, lipids, RNA, DNA, amino acids and so forth. And how they relate to each other obviously makes all the difference.

The natural laws of code also relate to structure. So what are the elements and relationships in code?

When we structure code, we often focus on classes or similar namespaces. Yet code is structured at all scales. There are small elements contained in classes. And there are large elements containing multiple classes.

An element within a class could be a function, method, property, variable, inner class and so forth. An element that groups multiple classes could be a component, package, module, layer, library, framework, micro service or even just a file.

**Structural elements of code may widely differ in size, usage and meaning. But in regards to structure, they are just *code artifacts*, pieces of code that can be formally distinguished, irrespective of their meaning.** In contrast, similar terms like *item*, *element*, *object*, *component*, *composite* and *entity* have specific meanings in certain contexts of software or mathematics.

## Dependencies

**Aside from the hierarchical composition of code artifacts, like a framework containing multiple files, code artifacts also relate to each other in more interesting ways. Think of a class that derives from another, or of a function that calls a remote micro service. All these relationships make the structure of code and are the focus of architectural principles.**

![](/blog-images/software-development/architecture/dependence/code-artifact-hierarchy.jpg)

When code artifacts *relate* to another, they *depend* on another. This technical dependence is easy to identify: **A code artifact `A` directly depends on another code artifact `B`, when `A` references `B` in any form or directly uses any functionality of `B`.** Or the other way around: If there's any aspect of `B` (name, interface, behaviour etc.) that, when changed, would require `A` to adapt, then `A` directly depends on `B`:

![](/blog-images/software-development/architecture/dependence/a-depends-on-b.jpg)

**For technical dependence itself, the semantics of how artifacts relate is utterly irrelevant.** Whether class `A` calls a function of class `B`, owns an object of type `B`, is instrinsically composed of objects of type `B` or derives itself from `B` doesn't alter the fact that `A` depends on `B`. In terms of UML class diagrams, arrows signify dependence but the arrow types are irrelevant for that matter:

![](/blog-images/software-development/architecture/dependence/uml-arrows.jpg)

## Architecture Diagrams

**We can now describe code structure more precisely as a number of hierarchically composed artifacts that depend on another.** And we'll sometimes refer to that structure as *architecture*.

**When sketching architecture, it is easy to confuse different perspectives, contaminating the diagram with relationships other than structural dependence.** Let's look at the two most common defectors: runtime reference and information flow.

### Dependence vs. Runtime Reference

Architecture identifies and relates *code artifacts* rather than *runtime instances*. The latter are basically memory areas that applications allocate at runtime. They could be objects, which are instances of classes, or even processes, which are instances of their respective program code. Runtime instances can reference each other through memory address pointers, network requests and other mechanisms.

**A runtime situation can be interesting but is only loosely related to code structure.** To mix both perspectives is surprisingly tempting, so their distinction gets clouded in casual conversations and sloppy sketches, but it is profound in reality. **Combining structural dependence and instance reference in the same diagram would make that diagram meaningless.**

Note, that patterns of object-oriented design are defined in terms of classes, not objects. Here is a [class diagram](https://en.wikipedia.org/wiki/Class_diagram) and one of many possible corresponding [object diagrams](https://en.wikipedia.org/wiki/Object_diagram):

![](/blog-images/software-development/architecture/dependence/classes-vs-objects.jpg)

Runtime reference doesn't even imply type dependence. Because of polymorphism, protocols and related techniques, instance `a` of type `A` can come to reference instance `b` of type `B` without `A` depending on `B`. Think, for example, of the delegate pattern.

Also, there can be multiple runtime instances of the same code artifact. In the above diagrams, `b` and `b2` are both supposed to be instances of `B`.

### Dependence vs. Information Flow

Information flow unfolds at runtime and is typically implicit in a sequence of runtime instances interacting with another. [UML sequence diagrams](https://en.wikipedia.org/wiki/Sequence_diagram) are a corresponding visual language:

![](/blog-images/software-development/architecture/dependence/sequence-diagram.jpg)

The instance that initiates the interaction must have a reference to the other. But one reference in only one direction (also called the direction of control) is enough to let information flow in both directions.

So, **information flow per se tells us very little about reference direction. But the real havoc sets in when we draw it into architecture diagrams where it isn't even an applicable concept.** After all, information flows between runtime instances, not between code artifacts.

When the distinction wasn't as clear to me yet, I sometimes began to mark information flow in structure diagrams. Sooner or later, I got stuck because I undermined the meaningfulness of those diagrams, ultimately rendering them useless. **When we conflate different levels of analysis in the same representation, we're not thinking clearly.**

## Dependence and Software Development

We tend to associate "software architecture" with principles and patterns of object-oriented design. At an abstract level, all those principles, like the [ADP](https://en.wikipedia.org/wiki/Acyclic_dependencies_principle), and patterns, like [Model-View-Controller](https://en.wikipedia.org/wiki/Model–view–controller), are defined in terms of type dependence. **To structure code is to manage dependencies.**

At the same time, code is just one side of the coin. **Dependencies between code artifacts are surface level manifestations of dependencies between real-world concerns. In a way, dependence is the underlying ordering principle of everything.** It doesn't only form the language of technical design patterns, it is also the living reason and driving force behind them.

In their fundamental role, **dependencies and their real-world meaning determine whether code meets the most essential non-functional requirement, which is *maintainability***, the ability to be changed. Without changes in software, there is no *software development*.

In his landmark publication "Design Principles and Design Patterns", Robert C. Martin writes:

> "What kind of changes cause designs to rot? Changes that introduce new and unplanned for dependencies. Each of the four symptoms mentioned above is either directly, or indirectly caused by improper dependencies between the modules of the software. It is the dependency architecture that is degrading, and with it the ability of the software to be maintained."

As mentioned earlier, Martin's ideas on architecture apply not only to "modules". We may read "modules" as "code artifacts" to really grasp the universal force of dependence, on which to meditate should be the first step of any trip into the heights and depths of kick-ass coding.

... to be continued ...