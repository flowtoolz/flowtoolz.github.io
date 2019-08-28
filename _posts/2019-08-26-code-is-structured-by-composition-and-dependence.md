---
title: "Code is Structured by Composition and Dependence"
layout: post
excerpt: "In part 4 of this series, we show how dependencies between composed code artifacts define the structural side of architecture."
image_url: /blog-images/software-development/architecture/zen-stack.jpg
keywords: software architecture, software, architecture, zen, code quality, software quality, book, software development, architecture pattern, design pattern, productivity, philosophy, dependence, object-oriented design
---

<img style="margin-left:auto;margin-right:auto;display:block;" src="/blog-images/software-development/architecture/zen-stack.jpg" title="{{ page.title }}" alt="{{ page.title }}. {{ page.keywords }}">

In this text, we establish the notion that architecture is technically determined by dependencies. The texts follwing this one will build upon all introduced ideas and ultimately tie everything together.

## Code Artifacts

The natural laws of life relate to its structure. Structure is defined by *structural elements* and the *relationships* between them. The elements of life are atoms, organic compounds, peptides, lipids, RNA, DNA, amino acids and so forth. And how they relate to each other obviously makes all the difference.

The natural laws of code also relate to structure. So what are the elements and relationships in code?

When we structure code, we often focus on classes or similar namespaces. Yet code is structured at all scales. There are small elements contained in classes. And there are large elements containing multiple classes.

An element within a class could be a function, method, property, variable, inner class and so forth. An element that groups multiple classes could be a component, package, module, layer, library, framework, micro service or even just a file.

**Structural elements of code may widely differ in size, usage and meaning. But in regards to structure, they are just *code artifacts*, pieces of code that can be formally distinguished, irrespective of their meaning.** In contrast, similar terms like *item*, *element*, *object*, *component*, *composite* and *entity* have specific meanings in certain contexts of software or mathematics.

## Dependencies

**Aside from the hierarchical composition of code artifacts, like a framework containing multiple files, code artifacts also relate to each other in more interesting ways. Think of a class that derives from another, or of a function that calls a remote micro service. All these relationships make the structure of code and are the focus of architectural principles.**

![](/blog-images/software-development/architecture/code-artifact-hierarchy.jpg)

When code artifacts *relate* to another, they *depend* on another. This technical dependence is easy to identify: **A code artifact `A` directly depends on another code artifact `B`, when `A` refers to `B` in any form or directly uses any functionality of `B`.** Or the other way around: If there's any aspect of `B` (name, interface, behaviour etc.) that, when changed, would require `A` to adapt, then `A` directly depends on `B`:

![](/blog-images/software-development/architecture/a-depends-on-b.jpg)

**For technical dependence itself, the semantics of how artifacts relate is utterly irrelevant.** Whether class `A` calls a function of class `B`, has a property of type `B`, is intrinsically composed of properties of type `B` or derives itself from `B` doesn't alter the fact that `A` depends on `B`. In terms of UML class diagrams, arrows signify dependence but the arrow types are irrelevant for that matter:

![](/blog-images/software-development/architecture/uml-arrows.jpg)

## Architecture Diagrams

**We can now describe code structure more precisely as a number of hierarchically composed artifacts that depend on another.** And we'll sometimes refer to that structure as *architecture*.

**When sketching architecture, it is easy to confuse different perspectives, contaminating the diagram with relationships other than structural dependence.** Let's look at the two most common defectors: runtime reference and information flow.

### Dependence vs. Runtime Reference

Architecture identifies and relates *code artifacts* rather than *runtime instances*. The latter are basically memory areas that applications allocate at runtime. They could be objects, which are instances of classes, or even processes, which are instances of their respective program code. Runtime instances can reference each other through memory address pointers, URLs and other mechanisms.

**A runtime situation can be interesting but is only loosely related to code structure.** To mix both perspectives is surprisingly tempting, so their distinction gets clouded in casual conversations and sloppy sketches, but it is profound in reality. **Combining structural dependence and instance reference in the same diagram would make that diagram meaningless.**

Note, that patterns of object-oriented design are defined in terms of classes, not objects. Here is a [class diagram](https://en.wikipedia.org/wiki/Class_diagram) and one of many possible corresponding [object diagrams](https://en.wikipedia.org/wiki/Object_diagram):

![](/blog-images/software-development/architecture/classes-vs-objects.jpg)

Runtime reference doesn't even imply type dependence. Because of polymorphism, protocols and related techniques, instance `a` of type `A` can come to reference instance `b` of type `B` without `A` depending on `B`. Think, for example, of the delegate pattern.

Also, there can be multiple runtime instances of the same code artifact. In the above diagrams, `b` and `b2` are both supposed to be instances of `B`.

### Dependence vs. Information Flow

*Information flow* unfolds at runtime and is typically implicit in a sequence of runtime instances interacting with another. [UML sequence diagrams](https://en.wikipedia.org/wiki/Sequence_diagram) are a corresponding visual language:

![](/blog-images/software-development/architecture/sequence-diagram.jpg)

The instance that initiates the interaction must have a reference to the other. But one reference in only one direction (also called the direction of control) is enough to let information flow in both directions.

So, **information flow per se tells us very little about reference direction. But the real havoc sets in when we draw it into architecture diagrams where it isn't even an applicable concept.** After all, information flows between runtime instances, not between code artifacts.

When the distinction wasn't as clear to me yet, I sometimes began to mark information flow in structure diagrams. Sooner or later, I got stuck because I undermined the meaningfulness of those diagrams, ultimately rendering them useless. **When we conflate different levels of analysis in the same representation, we're not thinking clearly.**

## Dependence and Software Development

We tend to associate software architecture with principles and patterns of object-oriented design. At an abstract level, all those principles, like the [ADP](https://en.wikipedia.org/wiki/Acyclic_dependencies_principle), and patterns, like [Model-View-Controller](https://en.wikipedia.org/wiki/Model–view–controller), are defined in terms of type dependence. **To structure code is to manage dependencies.**

Furthermore, code is just one side of the coin. **Dependencies between code artifacts are technical manifestations of dependencies between real-world concerns. In a way, dependence is the underlying ordering principle of everything.** It doesn't only form the language of design patterns, it is also the living reason and driving force behind them.

But who cares about structure or the meaning of dependencies? Code is never an issue anyway, it's just those annoying people who want us to change the code all the time, right?

Certainly, functional and technical requirements are in flux. For a code base to survive, it must adapt to an ever changing world. **In the evolution of organisms and code, flexibility is resilience and rigidity is death.** In other words: Software is supposed to be soft. We rather have incorrect code that we can change easily than correct code that noone dares to touch anymore.

And that's why dependencies are the structural essence of software. In their fundamental role, **dependencies and their real-world meaning determine whether code meets the most essential requirement, which is *maintainability***, the ability to be changed. Without changes in software, there is no *software development*.

In his landmark publication "Design Principles and Design Patterns", Robert C. Martin writes:

> "What kind of changes cause designs to rot? Changes that introduce new and unplanned for dependencies. Each of the four symptoms mentioned above is either directly, or indirectly caused by improper dependencies between the modules of the software. It is the dependency architecture that is degrading, and with it the ability of the software to be maintained."

As mentioned earlier, Martin's ideas on architecture apply not only to "modules". We may read "modules" as "code artifacts" to really grasp the universal force of dependence. And to meditate on this force should be the first step of any adventure trip into the heights and depths of kick-ass coding.
