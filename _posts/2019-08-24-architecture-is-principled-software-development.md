---
title: "Architecture is Principled Software Development"
layout: post
excerpt: "In part 2 of this series, we discuss the role of principles or \"natural laws\" that govern the realm of code."
image_url: /blog-images/software-development/architecture/dependence/zen-stack.jpg
keywords: software architecture, software, architecture, zen, code quality, software quality, book, software development, architecture pattern, design pattern, productivity, philosophy, dependence, object-oriented design
---

<img style="margin-left:auto;margin-right:auto;display:block;" src="/blog-images/software-development/architecture/zen-stack.jpg" title="{{ page.title }}" alt="{{ page.title }}. {{ page.keywords }}">

## Is Architecture for Buildings? 

*Software architecture* is a fuzzy term and we'll deconstruct it anyway, so let's not get bogged down by "definitions". Instead, let's build upon our intuitive understanding and address common misconceptions.

In the realm of software, architecture is, first and foremost, a metaphor. It's a useful one. But, like with any metaphor, you can take it to a point where it breaks down. Its applicability is limited and depends on what aspects we want to illuminate.

One aspect in which the metaphor fails software is this: Real world construction requires [up front design](https://en.wikipedia.org/wiki/Big_Design_Up_Front) while software can evolve organically. The software architect can quickly build a working product and then iterate over it again and again. It's like starting with a small hut, with no windows, plumbing or electricity, and then growing that hut, step by step, into a futuristic complex.

![](/blog-images/software-development/architecture/construction-vs-iteration.jpg)

Another mismatch worth remembering is that architecture of buildings involves the aesthetics they present to the end customer. In that sense, it is artistic and subjective. What interests us about software architecture is neither artistic nor subjective.

In some aspects, the metaphor is valid: Architecture relates to the structure of the end product. It's supposed to meet functional and non-functional requirements. And it must accord with natural laws.

For buildings, those natural laws are the laws of physics. For software, noone has really articulated them. Common patterns and principles suggest that there are some fundamental insights buried within our best practices. It seems we're already half-conscious of the laws of code. Throughout this book, we'll attempt to excavate them.

## Architecture Pattern Recognition

**“Architectural” patterns and principles are supposed to paint the big picture. And while that zoomed out perspective is wide in scope, it is often shallow conceptually.** We want a deeper level of analysis because, as they say, you can’t solve a problem at the same level at which it occurs.

In daily practice, we feel we have an intuition of what "clean" design, proper "engineering" and "elegant" solutions would look like. But **what we think is optimal or what feels beautiful isn't necessarily that by the intrinsic standards and true nature of the subject matter**.

Often, we cling to some so called "architecture" without really knowing why. **Compliance with an architecture pattern yields consistency and beauty in terms of that pattern but not necessarily in terms of the nature of software itself.**

[Model-View-Presenter](https://en.wikipedia.org/wiki/Model–view–presenter), for instance, is not an architecture. It's a subjective observation, a simplified model of reality, a perceived pattern:

![](/blog-images/software-development/architecture/mvp.jpg)

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

![](/blog-images/software-development/architecture/product-process-principles.jpg)

Here is what they mean in our context:

1. The **product** is the ultimate outcome. The product of *software architecture* is software - not "architecture".
2. The **process** produces the product with respect to the principles. It is the dynamic activity (or negligence) of the architect. 
3. The **principles** describe the domain of production, its entities and rules. They're the science of the materials and building blocks the architect has to work with. The basic material of *software architecture* is code.

### Product

Note, that our approach applies to everything made of code, independent of the underlying hardware-structure. Technical *system architecture* is a different subject. So you may have any type of software in mind: A highly distributed system, a microservice, a mobile app, a web service, whatever you're doing.

Now, **the global high-level code structure that we commonly call *architecture* describes what holds a particular software product together and what makes it a *thing* at all**. It's a level of analysis applicable to any product, even if the product wasn't designed at that level.

### Principles

**Principles, on the other hand, are the natural laws that govern the universe in which the product arises. They determine what can possibly manifest as a stable entity.**

Everything exists as a consequence of such laws and only as far as it is in accordance with them. As far as something disintegrates, it is obviously, as a *thing*, not in accordance with the laws of its universe.

**Our notion of *architecture* includes a core of universal principles in addition to the product structure to which they apply**: To grow into a healthy long-lived human being, we must design our lifestyle in accordance with *the architecture of human existence*. To grow a healthy long-lived code base, we must design it in accordance with *the architecture of code*.

While principles might seem trivial or abstract at first, their beauty lies in their combinded far reaching implications. A deeper understanding of code provides guidance and clarity, not only for how we solve global structure, but also down to the nitty gritty details of how to lay out a ten line function. It will always just feel logical and not anymore like guess work, black magic, subjective taste, art, intuition or dogma.

Before we proceed, you might be wondering what Uncle Bob has to say about all this. How do his famous principles fit into the picture?

## The Role of Uncle Bob's Principles

[Robert C. Martin (a.k.a. Uncle Bob)](https://blog.cleancoder.com) is not just a pioneer of the agile and craftsmanship movements, he also laid a foundation for methodical software architecture. His [11 principles of class and package design](https://web.archive.org/web/20150906155800/http://www.objectmentor.com/resources/articles/Principles_and_Patterns.jpg) are profound and have vast implications on code structure.

**While Uncle Bob is a legend among developers, most do not know, let alone apply, the principles he repeatedly wrote about since first publishing them more than two decades ago. As true software craftsmen, our thinking should revolve around such essential timeless principles, instead of the ephemeral (and by themselves meaningless) technical details of the latest technologies.**

We'll cover the wisdom of all of Uncle Bob's principles and more. However, we approach it from a different perspective, in our own terms, less as a list of abstract definitions and more integrated into a meaningful learning process.

Our line of reasoning leads to results that contain abstractions of Uncle Bob's principles. We'll also present some explicit arguments for why certain generalizations of those principles make sense.

Most importantly, **the laws we deduct do not parcel out classes or packages. Instead, they apply to all code artifacts at all scales, from functions to large sub-systems**. This also means we **should** apply them at all scales because conforming to a law at one level, say at the class level, does not guarantee conformance at others, like at the package level.

As far as this book conveys the ideas of Uncle Bob's principles, it provides an additional access to their essence. **Getting a feel for underlying reasons has a bigger impact on practice and is more profoundly valuable than just knowing a list of Dos and Don'ts.**

... to be continued ...