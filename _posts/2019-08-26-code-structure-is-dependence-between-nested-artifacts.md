---
title: "Code Structure is Dependence Between Nested Artifacts"
layout: post
excerpt: "In part 4 of this series, we show how dependencies between hierarchically composed artifacts define the structure of source code."
image_url: /blog-images/software-development/architecture/zen-stack.jpg
keywords: software architecture, software, architecture, zen, code quality, software quality, book, software development, architecture pattern, design pattern, productivity, philosophy, dependence, object-oriented design
---

<img style="margin-left:auto;margin-right:auto;display:block;" src="/blog-images/software-development/architecture/zen-stack.jpg" title="{{ page.title }}" alt="{{ page.title }}. {{ page.keywords }}">

The natural laws of life relate to its structure. Structure is defined by *elements* and the *relationships* between them. The elements of life are atoms, organic compounds, peptides, lipids, RNA, DNA, amino acids and so forth. And how they relate to each other obviously makes all the difference.

The natural laws of code also relate to structure. So what are the elements and relationships in code?

[Previously](https://www.flowtoolz.com/2019/08/25/code-represents-customer-value-and-technology.html), we explored the way code conveys meaning. Here, we examine the way it is structured. To that purpose, we put tech- and value environment aside for a moment and focus instead on the actual source code, its organizational units and circuitry.

This is the second and last "axiomatic" discussion. The texts follwing this one will build more upon already introduced ideas and ultimately tie everything together.

## Artifacts

When we structure source code, we mostly think about classes and similar namespaces. Of course, code is structured at other scales as well. There are smaller language constructs contained in classes, like functions, properties, nested types and so forth. And there are larger scopes containing multiple classes, like architectural layers, micro services, libraries, frameworks, modules, packages and even just source files.

Those organizational units of code may widely differ in size, usage and meaning. But for the purpose of this analysis, we can regard them as pure *code artifacts*, pieces of code that are structurally distinct, irrespective of what they mean.

A code artifact is typically composed of other smaller artifacts that we might call its parts. Examples would be a project containing modules, a module containing files, a file containing actual language contructs, and a function containing statements in its body. This nesting can go many levels deep, and we need it to structure our code.

<!-- todo: diagram! -->

## Dependencies

Aside from the hierarchical composition of code artifacts, they also relate to each other in more interesting ways. Think of a class that derives from another, or of a function that calls a remote micro service. All these relationships make the structure of code and are the focus of architectural principles.

![](/blog-images/software-development/architecture/code-artifact-hierarchy.jpg)

When code artifacts *relate* to another, they *depend* on another. This technical dependence is easy to identify: **A code artifact `A` directly depends on another code artifact `B`, when `A` refers to `B` in any form or directly uses any functionality of `B`.** Or the other way around: If there's any aspect of `B` (name, interface, behaviour etc.) that, when changed, would require `A` to adapt, then `A` directly depends on `B`:

![](/blog-images/software-development/architecture/a-depends-on-b.jpg)

For technical dependence itself, the semantics of how artifacts relate is utterly irrelevant. Whether class `A` calls a function of class `B`, has a property of type `B`, is intrinsically composed of properties of type `B` or derives itself from `B` doesn't alter the fact that `A` depends on `B`. In terms of UML class diagrams, arrows signify dependence but the arrow types are irrelevant for that matter:

![](/blog-images/software-development/architecture/uml-arrows.jpg)

<!-- todo: transitively implied dependencies: just as relevant but no need to draw them in a diagram. don't fool yourself with "encapsulation", information hiding and layering: those ideas do not alter the dependency structure and are therefor rather cosmetic. indirection is not decoupling! -->

<!-- todo: von meaning abgrenzen, siehe schlechtes bsp. in "a philosophy of ..." wo alle views ihre eigene hintergrundfarbe definiert haben obwohl die value env. impliziert es gäbe nur eine... die tatsache dass man beim ändern einer farbe auch die anderen beachten muss ist keine dependency sondern folgt daraus dass die value environment, also die realität dessen was dargestellt werden soll nicht präzise im code abgebildet ist ...  -->

## Nesting Bundles Dependencies

First, the obvious: An artifact contains all its parts. So if you depend on it, you depend on all the parts.

So far so banal, now here's the thing: The nature of structural composition is that the composed artifact is like any other artefact. So the cost of abstracting away the parts is that they are only accessible through their parent artifact.

In other words, you cannot directly depend on anything within an artifact. Only the artifact itself does that. So if you want to depend on any one of its parts, you have to depend on the whole and thereby an *all* its parts. An artifact shields its parts from any direct dependence and thereby bundles all incoming dependencies.

An artifact does not just bundle incoming dependencies but also outgoing ones: If only one part `P` in artifact `A` depends on some external artefact `B` outside of `A`, then clients of `A` will always depend on `B` as well, even if they're not interested in `B` at all, and even if what they need from `A` doesn't require anything from `B` either.

<!-- todo: example diagrams -->

## The Structure of Code is Not its Meaning

When we want to understand mere technical code structure, we must be careful not to confuse that with the structure of its meaning. In particular, we must be aware of the limits of UML notation in that regard. 

UML class diagrams depict a weird mixture of classes (code artifacts) and the concepts (meaning) those classes represent. For instance, UML class composition expresses that a composite consists of a component and that the component cannot exist outside of the composite. However, that description does not apply to the actual pieces of code. Whether the component is declared within the scope of the composite's code is a totally independent question.

Also note, that structural nesting is much more general and applies to all code artifacts at all scales, while composition in UML applies to types and in particular to classes. Structural nesting and conceptual composition are similar but orthoganal concepts. We can have each without the other.

## Architecture Diagrams

We can now describe code structure more precisely as a number of hierarchically composed artifacts that depend on another. And we'll sometimes refer to that structure as *architecture*.

When sketching architecture, it is easy to confuse different perspectives, contaminating the diagram with relationships other than structural dependence. Let's look at the two most common defectors: runtime reference and information flow.

### Dependence vs. Runtime Reference

Architecture identifies and relates *code artifacts* rather than *runtime instances*. The latter are basically memory areas that applications allocate at runtime. They could be objects, which are instances of classes, or even processes, which are instances of their respective program code. Runtime instances can reference each other through memory address pointers, URLs and other mechanisms.

A runtime situation can be interesting but is only loosely related to code structure. To mix both perspectives is surprisingly tempting, so their distinction gets clouded in casual conversations and sloppy sketches, but it is profound in reality. Combining structural dependence and instance reference in the same diagram would make that diagram meaningless.

Note, that patterns of object-oriented design are defined in terms of classes, not objects. Here is a [class diagram](https://en.wikipedia.org/wiki/Class_diagram) and one of many possible corresponding [object diagrams](https://en.wikipedia.org/wiki/Object_diagram):

![](/blog-images/software-development/architecture/classes-vs-objects.jpg)

Runtime reference doesn't even imply type dependence. Because of polymorphism, protocols and related techniques, instance `a` of type `A` can come to reference instance `b` of type `B` without `A` depending on `B`. Think, for example, of the delegate pattern.

Also, there can be multiple runtime instances of the same code artifact. In the above diagrams, `b` and `b2` are both supposed to be instances of `B`.

### Dependence vs. Information Flow

*Information flow* unfolds at runtime and is typically implicit in a sequence of runtime instances interacting with another. [UML sequence diagrams](https://en.wikipedia.org/wiki/Sequence_diagram) are a corresponding visual language:

![](/blog-images/software-development/architecture/sequence-diagram.jpg)

The instance that initiates the interaction must have a reference to the other. However, one reference alone (in the "direction of control") is already enough to let information flow both ways. So, information flow per se tells us very little about reference direction.

Now, the real havoc sets in when we draw information flow into architecture diagrams where it isn't even an applicable concept. After all, information flows between runtime instances, not between code artifacts.

When the distinction wasn't as clear to me yet, I sometimes began to mark information flow in structure diagrams. Sooner or later, I got stuck because I undermined the meaningfulness of those diagrams, ultimately rendering them useless. When we conflate different levels of analysis in the same representation, we're not thinking clearly.