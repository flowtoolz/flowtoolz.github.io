---
title: "Code Structure is Determined by Dependencies"
layout: post
excerpt: "In part 4 of this series, we show how dependencies between hierarchically composed artifacts define the structure of source code."
image_url: /blog-images/software-development/architecture/zen-stack.jpg
keywords: software architecture, software, architecture, zen, code quality, software quality, book, software development, architecture pattern, design pattern, productivity, philosophy, dependence, object-oriented design
---

<img style="margin-left:auto;margin-right:auto;display:block;" src="/blog-images/software-development/architecture/zen-stack.jpg" title="{{ page.title }}" alt="{{ page.title }}. {{ page.keywords }}">

The natural laws of life relate to its structure. Structure is defined by *elements* and the *relationships* between them. The elements of life are atoms, organic compounds, peptides, lipids, RNA, DNA, amino acids and so forth. And how they relate to each other obviously makes all the difference.

The natural laws of code also relate to structure. So what are the elements and relationships in code?

[Previously](https://www.flowtoolz.com/2019/08/25/code-represents-customer-value-and-technology.html), we explored the way code conveys meaning. Here, we examine the way it is structured. To that purpose, we put [tech- and value environment](https://www.flowtoolz.com/2019/08/25/code-represents-customer-value-and-technology.html) aside for a moment and focus instead on the actual source code, its organizational units and circuitry.

This is the second and last "axiomatic" discussion. The texts follwing this one will build more upon already introduced ideas and ultimately tie everything together.

## Artifacts

When we structure source code, we mostly think about classes and similar namespaces. Of course, code is structured at other scales as well. There are smaller language constructs contained in classes, like functions, properties and nested types. And there are larger scopes containing multiple classes, like architectural layers, micro services, libraries, frameworks, modules, packages and even just source files.

Those organizational units of code may widely differ in size, usage and meaning. But for the purpose of this analysis, we can regard them as pure *code artifacts*, pieces of code that are structurally distinct, irrespective of what they represent.

<!-- todo: diagram! -->

A code artifact is typically composed of other smaller artifacts that we might call its parts. Examples would be a project containing modules, a module containing files, a file containing actual language contructs, and a function containing statements in its body. This nesting can go many levels deep, and we need it to structure our code.

![](/blog-images/software-development/architecture/code-artifact-hierarchy.jpg)

Aside from the hierarchical composition of code artifacts, they also relate to each other in more interesting ways. Think of a class that derives from another, or of a function that calls a remote micro service. All these relationships define the structure of code and are the focus of architectural principles.

## Dependence

When code artifacts *relate* to another, they *depend* on another. Those dependencies are either explicit or implicit.

### Explicit Dependence

There are two types of *explicit dependence*, and they're easy to identify:

1. **Calling:** If code artifact `A` directly refers to code artifact `B` or any of `B`'s interface in any form then `A` explicitly depends on `B`.
2. **Nesting:** If code artifact `B` is nested inside of code artifact `A` and so is an inherent part of `A` then `A` explicitly depends on `B`.

If `A` and `B` are actually compiled together, dependence by calling can also be defined like so: If we could change `B` in a way that would require a change of `A` for both to compile again, then `A` explicitly depends on `B`:

![](/blog-images/software-development/architecture/a-depends-on-b.jpg)

### Implicit Dependence

Dependencies can imply that an artifact effectively, although indirectly, depends on another artifact, which amounts to an *implicit dependency*. There are two types of *implicit dependence*:

1. **Transitivity:** If `A` depends on `B` and `B` depends on `C` then `A` implicitly depends on `C`.
2. **Bundling:** If `A` depends on a part of `B` while `A` itself is not part of `B` then `A` implicitly depends on `B`.

Bundling refers to how an artifact generalizes its parts in terms of incoming dependencies. This only occurs because such incoming dependencies cross the artifact's boundary. Since `A` is outside the scope of `B` it has to know about `B` or at least require the existence of `B` in order to depend on any part inside of `B`. Would `A` itself be a part of `B`, it could depend on any other such part, totally ignorant of the enclosing scope `B`.

We had to list dependency bundling for logical completeness. But in most practical contexts, depending on an artifact's parts requires an explicit reference to that artifact anyway. Think of how a source file `A` depends on a type declared within another file `B`. In most programming languages, `A` would need to explicitly import `B`. An example exception to this is the language Swift.

<!-- todo: diagrams for the rules -->

<!-- todo: utilize the term "enclosing" to distinguish part from its container -->

### Further Implications

First of all, note that the parts of an artifact do **not implicitly** depend on that artifact. In other words, an artifact does **not automatically** depend on its enclosing scope. It is however possible that a part **explicitly** depends on the whole, in which case nesting creates a dependence cycle between the two.

Transitivity and nesting imply that if `A` depends on `B`, then `A` depends on all parts of `B`. Transitivity, nesting and bundling all together imply that if `A` depends on one part of `B`, then `A` depends on all parts of `B`. And if just one part of those parts depends on `C`, then every client `A` of `B` depend on `C` as well, even if `A` is not particularly interested in `C` and even if what it needs from `B` doesn't require anything from `C` either.

An implicit dependence is less direct but structurally and logically just as relevant. We better not fool ourselves in thinking that indirection, layering, "encapsulation", information hiding or the facade pattern would equal *decoupling*. Those ideas do not alter the effective dependency structure and are comparatively cosmetic.

<!-- todo: example diagrams -->

## The Structure of Code is Not its Meaning

For structural dependence itself, the semantics of how artifacts relate is utterly irrelevant. Whether class `A` calls a function of class `B`, has a property of type `B`, is intrinsically composed of properties of type `B` or derives itself from `B` doesn't alter the fact that `A` depends on `B`. In terms of UML class diagrams, arrows signify dependence but the arrow types are irrelevant for that matter:

![](/blog-images/software-development/architecture/uml-arrows.jpg)

<!-- todo: von meaning abgrenzen, siehe schlechtes bsp. in "a philosophy of ..." wo alle views ihre eigene hintergrundfarbe definiert haben obwohl die value env. impliziert es gäbe nur eine... die tatsache dass man beim ändern einer farbe auch die anderen beachten muss ist keine dependency sondern folgt daraus dass die value environment, also die realität dessen was dargestellt werden soll nicht präzise im code abgebildet ist ...  -->

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