---
title: "Zen in the Art of Software Architecture, Part 2"
layout: post
excerpt: "The 2nd half of the introduction from  ”Zen in the Art of Software Architecture - From Timeless Principles to Timely Products”. We cover the basics and get ready to deduct the natural laws and architecture of code."
image_url: /blog-images/software-development/architecture/zen-dojo.jpg
keywords: software architecture, software, architecture, zen, code quality, software quality, book, software development, architecture pattern, design pattern, productivity, philosophy
---

<img style="margin-left:auto;margin-right:auto;display:block;" src="/blog-images/software-development/architecture/zen-dojo.jpg" title="{{ page.title }}" alt="{{ page.title }}. {{ page.keywords }}">

<i>This is a series of excerpts from a book: "Zen in the Art of Software Architecture - From Timeless Principles to Timely Products". The draft will evolve, and I'll rework published content without highlighting every edit.</i>

## Product, Process, Principles

So where do we even begin? Every type of productivity involves these layers:
<img style="margin-left:auto;margin-right:auto;display:block;max-width:423px"
src="/blog-images/software-development/architecture/three-Ps.png"
title="{{ page.title }}"
alt="{{ page.title }}. {{ page.keywords }}">

Here is what they mean in our context:

1. The **product** is the ultimate outcome. The product of *software architecture* is software - not "architecture".
2. The **process** produces the product with respect to the principles. It is the dynamic activity (or negligence) of the architect. 
3. The **principles** describe the domain of production, its entities and rules. They're the science of the materials and building blocks the architect has to work with. The basic material of *software architecture* is code.

### Product

Note, that our approach applies to everything made of code, independent of the underlying hardware-structure. Technical *system architecture* is a different subject. So you may have any type of software in mind: A highly distributed system, a microservice, a mobile app, a web service, whatever you're doing.

<img style="margin-left:auto;margin-right:auto;display:block;" src="/blog-images/software-development/architecture/program-code.jpg" title="{{ page.title }}" alt="{{ page.title }}. {{ page.keywords }}">

Now, **the gobal high-level code structure that people commonly call "architecture" describes what holds a particular software product together and what makes it a *thing* at all**. It's a level of analysis applicable to any product, even if the product wasn't designed at that level.

### Principles

**Principles are the natural laws that govern the universe in which the product arises. They determine what can possibly manifest as a stable entity.** Everything exists as a consequence of such laws and only as far as it is in accordance with them. As far as something disintegrates, it is obviously, as a *thing*, not in accordance with the laws of its universe.

<img style="margin-left:auto;margin-right:auto;display:block;" src="/blog-images/software-development/architecture/blackboard-equations.jpg" title="{{ page.title }}" alt="{{ page.title }}. {{ page.keywords }}">

**When we'll speak of *architecture*, we will mean universal principles rather than the product**: To grow into a healthy long-lived human being, we must design our lifestyle in accordance with *the architecture of  human existence*. To grow a healthy long-lived code base, we must design it in accordance with *the architecture of code*.

Now, if we understand *software architecture* as a set of principles that naturally apply to all code, then what are these principles? Let's narrow them down!

## The Structure of Code

The natural laws of life relate to its structure. Structure is defined by *structural elements* and the *relationships* between them. The elements of life are atoms, organic compounds, peptides, lipids, RNA, DNA, amino acids and so forth. And how they relate to each other obviously makes all the difference.

<img style="margin-left:auto;margin-right:auto;display:block;" src="/blog-images/software-development/architecture/building-blocks-of-life.jpg" title="{{ page.title }}" alt="{{ page.title }}. {{ page.keywords }}">

The natural laws of code also relate to structure. So what are the elements and relationships in code?

When we structure code, we often focus on classes or similar namespaces. But really, code can be structured at all scales. There are small elements that can be contained in classes. And there are large elements that can contain multiple classes.

An element within a class could be a function, method, property, variable, inner class and so forth. An element that groups multiple classes could be a component, package, module, layer, library, framework, micro service or even just a file.

Structural elements of code may widely differ in size, usage and meaning. But in regards to structure, they're just *code artifacts*, pieces of code that can be formally distinguished, irrespective of their meaning.

Note: In contrast to "artifact", similar terms like "item", "element", "object", "component", "composite" and "entity" have specific meanings in certain contexts of software or mathematics.

Aside from the hierarchical composition of code artifacts, like a module containing multiple classes, they can also relate to each other in more interesting ways. Think of a class that derives from another, or of an executable that calls a remote micro service. All these relationships make the structure of code and are the focus of architectural principles.

## The Role of Uncle Bob's Principles

[Robert C. Martin (a.k.a. Uncle Bob)](https://blog.cleancoder.com) is not just a pioneer of the agile and craftsmanship movements, he also laid the foundation for methodical software architecture. His [11 principles of class and package design](https://web.archive.org/web/20150906155800/http://www.objectmentor.com/resources/articles/Principles_and_Patterns.pdf) are profound and have vast implications on code structure.

<img style="margin-left:auto;margin-right:auto;display:block;" src="/blog-images/software-development/architecture/robert-martin-uncle-bob.jpg" title="{{ page.title }}" alt="{{ page.title }}. {{ page.keywords }}">

**While Uncle Bob is a legend among developers, most do not know, let alone apply, the principles he repeatedly wrote about since first publishing them more than two decades ago. As true software craftsmen, our thinking should revolve around such essential timeless principles, instead of the ephemeral (and by themselves meaningless) technical details of the latest technologies.**

This book includes the wisdom of all of Uncle Bob's principles and more. However, we'll cover that wisdom from a different perspective, in our own terms, less as a list of abstract definitions, and more integrated into a meaningful learning process.

Our approach and line of reasoning will lead to results that contain abstractions of Uncle Bob's principles. We'll also present some explicit arguments for why certain generalizations of those principles make sense for our purposes.

Most importantly, **the laws we deduct do not parcel out classes or packages. Instead, they apply to all code artifacts at all scales, from functions to large sub-systems**. This also means we **should** apply them at all scales, because conforming to a law at one level, say classes, does not guarantee conformance at another, like at the package level.

As far as this book conveys the ideas of Uncle Bob's principles, I hope to provide an additional way of understanding their essence. Now, let's advance to the core of effective architecture and then discuss the first law.

## Effective Code Tells the Truth

<!-- todo: make clear how even high-level structure of code maps reality and can more or less truthfully represent the structure of reality...  -->

Code is never the problem, it's those annoying people who want us to change the code all the time, right?

Functional and technical requirements are in flux. For a code base to survive, it must adapt to an ever changing world. **In the evolution of organisms and code, flexibility is resilience and rigidity is death.** In other words: Software is supposed to be soft. We rather have incorrect code that we can easily change than correct code that noone dares to touch anymore.

However, reality doesn't change through arbitrary glitches. At least, I'd like to believe mine doesn't. Instead, it's bound by an innate structure, its entities and rules. Some changes happen easily, while others require lots of energy or are simply impossible.

<!-- todo: consider: when people decide to kill off and rebuilt parts of a software product. The "reality" changes abruptly -->

<!-- todo: examples of easy and hard changes in reality and how they map to developer expectations in an app in that domain -->

When things change and the code can't keep up, it means the code didn't correspond to reality very well in the first place. I'm not saying code should map all details of the world, but it must map the relevant parts truthfully.

**Pieces of code represent pieces of reality, including the reality of domain, requirements and platform. The real-world concepts it represents are the *meaning* of code. Code is *meaningful* when it truthfully reflects the structure and mechanics of reality, no matter at what level of detail. Since *meaningful code* already corresponds to reality, it can easily adopt any changes that happen there.**

We intuitively understand how impactful a change is, in other words: we know its meaning. The effort that's required to implement that change in code should match our intuitive expectation. To put it simply: A "small" feature should be quick to implement.

As far as that's not the case, some part in the whole system is foul. Some part is not aligned with reality. We could even say: That part is untruthful.

This can mean, for instance, the necessary general frameworks are not available and application-agnostic functionality must be implemented, which is not part of our mental model of the application's reality. We intuitively assume that what is common across applications would pre-exist. And we'd be right to assume that because it should pre-exist in our tech stack.

Sometimes the foul parts are beyond the control of developers, like when platform frameworks are designed in unfathomable ways. On the other hand: If the changing part of reality, like a functional requirement, does not intrinsically depend on the framework, then the corresponding code shouldn't depend on it either, otherwise the code wouldn't be true to that reality.

Describing reality accurately is not just some heuristic for how to write resilient code. In a way, it's the whole purpose of code. **Code expresses conceptual and technical realities. And effective code tells the truth.**

We might look at this as *Law Zero*. It's the core of all laws and patterns we'll discuss. At the same time, those laws and patterns will also shine light on this core and will help us recognize and leverage the notion that code, in its essence, speaks about reality. Certainly, writing code is to speak in a programming language. So for now, let's not lie. Lies make bad karma. Let's just tell the truth. We'll see that effectiveness will follow.
