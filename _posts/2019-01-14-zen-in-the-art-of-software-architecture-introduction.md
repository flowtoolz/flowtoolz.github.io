---
title: "Zen in the Art of Software Architecture, Introduction"
layout: post
excerpt: "A short intro to ”Zen in the Art of Software Architecture - From Timeless Principles to Timely Products”. The why, what and how of this project."
image_url: /blog-images/software-development/architecture/introduction/zen-dojo.jpg
keywords: software architecture, software, architecture, zen, code quality, software quality, book, software development, architecture pattern, design pattern, productivity, philosophy
---

<img style="margin-left:auto;margin-right:auto;display:block;" src="/blog-images/software-development/architecture/introduction/zen-dojo.jpg" title="{{ page.title }}" alt="{{ page.title }}. {{ page.keywords }}">

<i>This starts a series of book excerpts from: "Zen in the Art of Software Architecture - From Timeless Principles to Timely Products". The draft keeps evolving, and I change published content without highlighting every edit. Last edit: May 27, 2019</i>

## The Call to Adventure

When I was eleven, I taught myself [Pascal](https://en.wikipedia.org/wiki/Pascal_(programming_language)) and, shortly after, [C++](https://en.wikipedia.org/wiki/C%2B%2B), [Windows programming](https://www.goodreads.com/book/show/420643.Programming_Windows), [DirectX](https://en.wikipedia.org/wiki/DirectX) and [game development](https://www.goodreads.com/book/show/2340474.Tricks_of_the_Game_Programming_Gurus). I remember cranking out countless over-engineered little beasts of code.

Again and again, those games, game engines and architectural frameworks would lead into dead ends, where  their structure hopelessly diverged from their purpose or their complexity brought them to a halt.

<img style="margin-left:auto;margin-right:auto;display:block;" src="/blog-images/software-development/architecture/introduction/first-steps.png" title="{{ page.title }}" alt="{{ page.title }}. {{ page.keywords }}">

And again and again, I started all over, wondering: How on earth is real professional software even possible? There must be some system or secret that I still don't know.

I chased answers to that fundamental question ever since. The abstract principles of software development have always intrigued me far more than the technical details.

## Are We Having Fun Yet?

To my surprise, I didn't find answers at universities. In fact, their process- and architecture related courses didn't much reflect modern reality. Software engineering, as they presented it, had already been [kind of dead](https://blog.codinghorror.com/software-engineering-dead/).

<img style="margin-left:auto;margin-right:auto;display:block;" src="/blog-images/software-development/architecture/introduction/audimax-dresden.jpg" title="{{ page.title }}" alt="{{ page.title }}. {{ page.keywords }}">

So I went on a journey of working on code, analyzing code, reading about code and thinking deeply about the nature of code. Writing down and integrating everything I learned, a theoretical framework emerged that seemed to explain common "architectures" and to answer all my questions.

It's abstract but simple and pragmatic, and I've been using it for years now to understand and (re-)factor my projects. I feel it might actually draw parallels to some deeper truths beyond software, we'll see.

In order to sort out, delineate and nail down my learnings, I'm writing this book. Also, the presented thought framework could be interesting to other people in the periphery of software development. I've put much work into it because it offers a perspective that I had greatly missed in the field.

My approach is systematic. However, I won't rattle down a longwinded proof and reference list for every statement I make. It's not an academic text. I don't have time for that, and neither have you. For the sake of brevity and practical value, let's focus on the essential line of reasoning. I'll sound opinionated, and you'll stay motivated. More fun for both of us 😃

## Where We're Coming From

As proud software craftsmen, our thinking is customer-centric, our code is object-oriented and functional, our design is domain-driven, our development is test- and behaviour-driven. We integrate automatically, iterate rapidly, deliver continuously and burn out occasionaly, fine.

<img style="margin-left:auto;margin-right:auto;display:block;" src="/blog-images/software-development/architecture/introduction/craftsmanship-tools.jpg" title="{{ page.title }}" alt="{{ page.title }}. {{ page.keywords }}">

Many of these techniques come in quite far down the delivery pipeline, yet all steps in the pipeline rely and build upon quality input. **No amount of automated testing and continuous integration can address or even recognize the future costs and consequences of fundamentally flawed code.**

However, most code-related techniques are quite low-level: The domain model is only one part of the application, design principles and patterns have quite local scope, and **a thousand perfect little TDD cycles with perfect little tests and refactorings can still amount to a mess on the grand scale**.

That's why we developers crave higher-level frameworks and patterns to guide our micro decisions. And that's where the A-word comes in: *Architecture*.

## Where We're Going

Instead of promoting some new "architecture", we will lay out a wider thought framework that can relate and explain the patterns we know.

Equipped with deep clarity about the fundamental principles of code structure, the patterns and rules we think of as architecture will dissolve and become non-issues. How to architect clean software systems and how to integrate different approaches will be obvious.

And it should be obvious because software, at its core, is surprisingly simple. Just like life. We'll see that much of it comes down to telling the truth.

<img style="margin-left:auto;margin-right:auto;display:block;" src="/blog-images/software-development/architecture/introduction/pinocchio.jpg" title="{{ page.title }}" alt="{{ page.title }}. {{ page.keywords }}">

**Code, like speech, must be truthful. Then, it's lasting, beautiful, lean, efficient and simple. When our solution is complex, chances are it's not sophisticated but just clumsy. Chances are we don't know the true problem just yet.**

Now, before we get into the [dharma](https://en.wikipedia.org/wiki/Dharma) of program code, let me recapture the spirit of this book by going over the remaining terms in the title: *Zen in the Art of Software Architecture - From Timeless Principles to Timely Products*

### Zen

We'll take a level-headed look at a fuzzy term that normally tends to overwhelm and that some might call a "meaningless buzzword". We'll aim at methodical precision, philosophical depth, ruthless pragmatism and absolute simplicity. 

Understanding universal truths about software, you'll see the big picture and true nature of your project, and that will put you into a flow state and the "fun" back into functioning code.

### Art

Software architecture requires more than science and craft. In order to build high quality software products with agility, you want to become an engineer, a craftsman and an artist. On top of knowledge and skill, the *software artist* adds the psychological maturity that allows him to ...

1. See the true meaning and semantic structure of a software
2. Let go of mere technicalities, perfectionism and feature creep
3. Intuitively feel when returns diminish and something is *good enough*
4. Truly empathize with users

### Timeless Principles

Two steps make the core of this book: 1) Deducting universal laws of code structure, and 2) analyzing common patterns of architecture and design through the lense of the established thought framework.

In the process, we'll look at many hand sketched diagrams but never at code or pseudo code because we want to understand high-level structure not low-level processes.

We'll also not touch on specific technologies, software types or application domains. Our focus will be on the message rather than the medium, so to speak.

### Timely Products

Timely products result from agility. Unfortunately, the term "agile" is overused and misunderstood. Let me say this much: Agility is not [Scrum](https://en.wikipedia.org/wiki/Scrum_(software_development)). Agile Software Development is any implementation of the ideas behind the [Agile Manifesto](https://agilemanifesto.org/principles.html). And effective architecture as we understand it derives from those ideas.

Effective architecture has all kinds of effects that help produce more value over time and, thereby, deliver timely products: It makes development flexible, puts emphasis on customer value, yields re-usable code, raises team engagement, accelerates onboarding, solves object-oriented design problems, promotes a common domain-specific language, avoids all sorts of technical risks, makes code more testable and so on.

We could drone on endlessly listing the direct and implied benefits. However, those benefits are not the reason for why we aim at effective architecture. They are just side effects, arbitrary manifestations of effective architecture. Of course, what "effective" means relates to the essential role and purpose of code, and we'll look at that more closely soon.
