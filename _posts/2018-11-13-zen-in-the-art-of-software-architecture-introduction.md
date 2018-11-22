---
title: "Zen in the Art of Software Architecture, Part 1"
layout: post
excerpt: "An excerpt from the introduction to ”Zen in the Art of Software Architecture”, a book I'm writing. Get a feel for tone and content. Much more will come."
image_url: /blog-images/software-development/architecture/zen-architecture.jpg
keywords: software architecture, software, architecture, zen, code quality, software quality, book, software development, architecture pattern, design pattern, productivity, philosophy
---

<img style="margin-left:auto;margin-right:auto;display:block;"
    src="/blog-images/software-development/architecture/zen-architecture.jpg"
    title="{{ page.title }}"
    alt="{{ page.title }}. {{ page.keywords }}">
    
<i>This is a series of excerpts from a book I'm writing: "Zen in the Art of Software Architecture - From Timeless Principles to Timely Products". The draft will evolve, and I'll rework published content without highlighting every edit.</i>

## The Call to Adventure

When I was eleven, I taught myself [Pascal](https://en.wikipedia.org/wiki/Pascal_(programming_language)) and, shortly after, [C++](https://en.wikipedia.org/wiki/C%2B%2B), [Windows programming](https://www.goodreads.com/book/show/420643.Programming_Windows), [DirectX](https://en.wikipedia.org/wiki/DirectX) and [game development](https://www.goodreads.com/book/show/2340474.Tricks_of_the_Game_Programming_Gurus). I remember cranking out countless over-engineered little beasts of code.

Again and again, those games, game engines and architectural frameworks would lead into dead ends, where  their structure hopelessly diverged from their purpose, or their complexity brought them to a halt.

And again and again, I started all over, wondering: How on earth is real professional software even possible? There must be some system or secret that I still don't know.

I pursued that fundamental question ever since. The abstract principles of software development have always intrigued me far more than the technical details.
 
## Are We Having Fun Yet?
 
To my surprise, I didn't find the answer at universities. In fact, their process- and architecture related courses didn't much reflect modern reality. Software engineering, as they presented it, had already been [kind of dead](https://www.computer.org/cms/Computer.org/ComputingNow/homepage/2009/0709/rW_SO_Viewpoints.pdf).

So, I went on a journey of working on code, analyzing code, reading about code and thinking deeply about the nature of code. Writing down and integrating everything I learned, a theoretical framework emerged that seemed to explain common "architectures" and to answer all my questions.

It's abstract but simple and pragmatic, and I've been using it for years now to understand and (re-)factor my projects. I feel it might actually draw parallels to some deeper truths beyond software, we'll see.

In order to sort out, delineate and nail down my learnings, I wrote this book. Also, the presented thought framework could be interesting to other people in the periphery of software development. I've put much work into it because it offers a perspective that I had greatly missed in the field.

My approach is systematic. However, I won't rattle down a longwinded proof and reference list for every statement I make. It's not an academic text. I don't have time for that, and neither have you. For the sake of brevity and practical value, let's focus on the essential line of reasoning. I'll sound opinionated, and you'll stay motivated. More fun for both of us :)

## Where We're Coming From

As proud software craftsmen, our thinking is customer-centric, our code structure is object-oriented, our design is domain-driven, our implementation is test-driven and our development is behaviour-driven. We integrate automatically, iterate rapidly, deliver continuously and burn out occasionaly, fine.

Many of these techniques come in quite far down the delivery pipeline, yet all steps in the pipeline rely and build upon quality input. **No amount of automated testing or continuous integration can adress, or even recognize, the future costs and implications of fundamentally flawed code.**

However, most code-related techniques are quite low-level: The domain model is only one part of the application, object-oriented design principles have mostly local scope, and **a thousand perfect little TDD cycles with perfect little tests and refactorings can still amount to a mess on the grand scale**.

That's why we developers crave higher-level frameworks and patterns to guide our micro decisions. And that's where the A-word comes in: *Architecture*.

## Is Architecture for Houses? 

Now, let's not get bogged down by definitions. You already have an intuitive understanding of *software architecture*. It's a fuzzy term, and we'll deconstruct it anyway.

In the realm of software, architecture remains a metaphor. It's a useful one. But, like any metaphor, you can take it to a point where it breaks down. Its applicability is limited and depends on what aspects you want to illuminate.

One aspect in which the metaphor fails software is this: Real world construction requires [up front design](https://en.wikipedia.org/wiki/Big_Design_Up_Front) while software can evolve organically.

The software architect can quickly build a working product and then iterate over it again and again. It's like starting with a one room house with no windows, plumbing or electricity and then growing that house, step by step, into a futuristic complex.

## Architecture Pattern Recognition

I bet you're already a little "architect" like me, aiming at code monuments of sheer beauty, why else would you pick up a book with such a pretentious title? But **what we think is optimal or what feels beautiful isn't necessarily that by the intrinsic standards and true nature of the subject matter**.

When developing software, we often cling to some so called "architecture" without really knowing why. **Compliance with an architecture pattern yields consistency and beauty in terms of that pattern but not necessarily in terms of the nature of software itself.**

[Model-View-Presenter](https://en.wikipedia.org/wiki/Model–view–presenter), for instance, is not an architecture. It's a subjective observation, a simplified model of reality, a perceived pattern.

**Concepts like MVP, MVC, MVVM or VIPER are more descriptive than normative. They describe patterns that emerge in clean architectures. But they're never the true basis or cause for clean architecture.**

There are myths in our field that we've conjured up through blind adherence to observed patterns. But **when you turn an observation into a dogma, you've lost the way**.

Here are just 10 of those **myths**:

1. Views must not access models
2. The application state must be immutable
3. Everything must be unit-tested
4. Independence is for re-usability
5. The model is the state of the application
6. Singletons are bad
7. Views must have no behaviour
8. View controllers are the only acceptable "manager" type of class
9. The view-model layer is only for output
10. Different "architectures" are mutually exclusive

I won't challenge them directly. But when we're able to put such ideas in perspective and understand where they come from, they appear small-minded, arbitrary, over-restrictive, superficial and needlessly confusing.

## Where We're Going

Instead of promoting some new "architecture", we will lay out a wider thought framework that can relate and explain the patterns we know.

Equipped with deep clarity about the fundamental principles of code structure, the patterns and rules we think of as architecture will dissolve and become non-issues. How to architect clean software systems and how to integrate different approaches will be obvious.

And it should be obvious because software, at its core, is surprisingly simple. Just like life. We'll see that much of it comes down to telling the truth.

**Code, like speech, must be truthful. Then, it's lasting, beautiful, lean, efficient and simple. When our solution is complex, chances are it's not sophisticated but just clumsy. Chances are we don't know the true problem just yet.**

Now, before we jump into the [dharma](https://en.wikipedia.org/wiki/Dharma) of program code, let me recapture the spirit of this book by going over the remaining terms in the title: *Zen in the Art of Software Architecture - From Timeless Principles to Timely Products*

### Zen

We'll take a level-headed look at a fuzzy term that normally tends to overwhelm and that some might call a "meaningless buzzword". We'll aim at methodical precision, philosophical depth, ruthless pragmatism and absolute simplicity. 

Understanding universal truths about software, you'll see the big picture and true nature of your project, and that will put you into a flow state and the "fun" back into functioning code.

### Art

Software architecture requires more than science and craft. In order to build high quality software products with agility, you want to become an engineer, a craftsman and an artist. On top of knowledge and skill, the *software artist* adds the pschological maturity that allows him to ...

1.  See the true meaning and semantic structure of a software
2. Let go of mere technicalities, perfectionism and feature creep
3. Intuitively feel when returns diminish and something is *good enough*
4. Truly empathize with users

### Timeless Principles

Two steps make the core of this book: 1) Deducting abstract principles, and 2) analyzing common patterns of architecture and design through the lense of the established thought framework.

In the process, we'll look at many hand sketched diagrams but never at code or pseudo code because we want to understand high-level structure not low-level processes.

We'll also not touch on specific technologies, software types or application domains. Our focus will be on the message rather than the medium, so to speak.

### Timely Products

Timely products result from agility. Unfortunately, the term "agile" is overused and misunderstood. Let me say this much: Agility is not [SCRUM](https://en.wikipedia.org/wiki/Scrum_(software_development)) but any implementation of the ideas behind the [Agile Manifesto](http://agilemanifesto.org/principles.html). And clean architecture derives from those ideas. 

Clean architecture has all kinds of effects that help produce more value over time and, thereby, deliver timely products: It makes development flexible, puts emphasis on customer value, yields re-usable code, raises team engagement, accelerates onboarding, solves object-oriented design problems, promotes a common domain-specific language, avoids all sorts of technical risks, makes code more testable, etc.

## Product, Process, Principles

So where do we even begin? Every type of productivity involves these layers:
<img style="margin-left:auto;margin-right:auto;display:block;max-width:423px"
src="/blog-images/software-development/architecture/three-Ps.png"
title="{{ page.title }}"
alt="{{ page.title }}. {{ page.keywords }}">

Here is what they mean:

1. The **product** is the ultimate outcome. In our context, the product is software, not "architecture".

2. The **process** produces the product with respect to the principles. It is the dynamic activity (or negligence) of the architect. 

3. The **principles** describe the domain of production, its entities and rules. Our domain is code.

### Product

Note, that our approach applies to everything made of code, independent of the underlying hardware-structure. Technical *system architecture* is a different subject.  So you may have any type of software in mind: A highly distributed system, a microservice, a mobile app, a web service, whatever you're doing.

Now, **the gobal high-level code structure that people commonly call "architecture" describes what holds a particular software product together and what makes it a *thing* at all**. It's a level of analysis applicable to any product, even if the product wasn't designed at that level.

### Principles

**Principles are the natural laws that govern the universe in which the product arises. They determine what can possibly manifest as a stable entity.** Everything exists as a consequence of such laws and only as far as it is in accordance with them. As far as something disintegrates, it is obviously, as a *thing*, not in accordance with the laws of its universe.

**When we'll speak of *architecture*, we will mean universal principles rather than the product**: To grow into a healthy long-lived human being, we must design our lifestyle in accordance with *the architecture of  human existence*. To grow a healthy long-lived code base, we must design it in accordance with *the architecture of code*.

Now, if we understand software architecture as a set of principles that naturally apply to all software, then what are these principles? Let's narrow them down!

... to be continued ...