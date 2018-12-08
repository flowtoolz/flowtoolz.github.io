---
title: "Zen in the Art of Software Architecture, Part 2"
layout: post
excerpt: "An excerpt from the introduction to ”Zen in the Art of Software Architecture”, a book I'm writing. Get a feel for tone and content. Much more will come."
image_url: /blog-images/software-development/architecture/zen-architecture.jpg
keywords: software architecture, software, architecture, zen, code quality, software quality, book, software development, architecture pattern, design pattern, productivity, philosophy
---

<img style="margin-left:auto;margin-right:auto;display:block;"
    src="/blog-images/software-development/architecture/zen-architecture.jpg"
    title="{{ page.title }}"
    alt="{{ page.title }}. {{ page.keywords }}">
    
<i>This is a series of excerpts from a book draft: "Zen in the Art of Software Architecture - From Timeless Principles to Timely Products". The draft will evolve, and I'll rework published content without highlighting every edit.</i>

## Effective Code Tells the Truth

Code is never the problem, it's those annoying people who want us to change the code all the time, right?

Functional and technical requirements are in flux. For a code base to survive, it must adapt to an ever changing world. In the evolution of organisms and code, flexibility means resilience, and stability means death.

However, reality doesn't change in arbitrary glitches. At least, I'd like to believe mine doesn't. Instead, it's bound by structure, its entities and rules. Some changes happen easily, while others require lots of energy or are simply impossible.

<!-- todo: consider: when people decide to kill off and rebuilt parts of a software product. The "reality" changes abruptly -->

<!-- todo: examples of easy an hard changes in reality and how they map to developer expectations in an app in that domain -->

When things change and the code can't catch up, it means the code didn't correspond to reality very well in the first place. I'm not saying code should map all details of the world, but it must map the relevant parts truthfully.

Pieces of code represent pieces of reality, including the reality of domain, requirements and platform. The real-world concepts it represents are the *meaning* of code. Code is *meaningful* when it truthfully reflects the structure and mechanics of reality, no matter at what level of detail. Since *meaningful code* already corresponds to reality, it can easily adopt any changes that happen there.

We intuitively understand how impactful a change is, in other words: we know its meaning. The effort that's required to implement that change in code should match our intuitive expectation. To put it simply: A small feature should be quick to implement.

As far as that's not the case, some part in the whole system is foul. Some part is not aligned with reality. We could even say: That part is untruthful.

This can mean, for instance, the necessary general frameworks are not available and application-agnostic functionality must be implemented, which is not part of our mental model of the application's reality. We intuitively assume that what is common across applications would pre-exist. And we'd be right to assume that because it should pre-exist in our tech stack.

Sometimes the foul parts are beyond the control of developers, like when platform frameworks are designed in unfathomable ways. On the other hand: If the changing part of reality, like a functional requirement, does not intrinsically depend on the framework, then the corresponding code shouldn't depend on it either, otherwise the code wouldn't be true to that reality.

Describing reality accurately is not just some heuristic for how to write resilient code. In a way, it's the whole purpose of code. Code expresses conceptual and technical realities. And effective code tells the truth.

## Clean Code as a Heuristic for Low-Level Effectiveness

Producing code is to speak in a programming language. When you do that, just don't lie. Lies make bad karma. Let's just tell the truth, and effectiveness will follow.

\subsubsection{(requirements change so we need changeable architecture)}

When we don't know how requirements will change and extend, we must demand flexibility. The code must be easily changeable, even its large-scale structure. Therefor, it must be clean code embedded in a clean architecture.

\subsubsection{(Why Clean Code? Changeability!)}

Code quality is a necessary (however not sufficient) ingredient of quality enterprise software. But more over, striving to produce quality code is part of our professional conduct as software craftsmen. And what is quality code? Above everything else, quality code is maintainable. We rather have incorrect code that we can change easily than correct code that no one dares to touch anymore.

\subsubsection{(preconditions of changeability)}

Maintainability implies a lot. For instance, maintainable code is required to be ...

self explanatory
structured in the way we think about its meaning (customer value)
free of unnecessary or meaningless coupling (dependencies)
covered by tests
Those four examples imply even more requirements. This document will detail the most important factors of code quality as we understand it.

\subsubsection{(Readable code is Clean Code)}

Self explanatory code must be readable. Readability is not merely about aesthetics but also about structure. Let's just call it clean code. Why do we need clean code?

Clean code lets others and your future self understand your code better.
Clean code makes communication about code easier.
Clean code is an expression of clean thinking. And it encourages clean thinking.
Clean code creates less bugs and is easier to debug and maintain

\subsubsection{(light controllers!)}

A classic temptation is to let controllers do business logic, but the DDD approach reminds us that the important part of an application is actually the model. You should move as much code as possible there by disentangling it from system specifics.

The same is true for the other dimension: Make code as application independent as possible, even if you don't plan to reuse it in the future. Getting that general code out of the way lets you (and others) see the actual application more clearly. But anyway, you should seize every project as an opportunity to extend your code portfolio.

\subsection{Write Expressive Code)}

Code that expresses the truth clearly is expressive code. Its naming must be precise, which is to say: as specific as possible.

Code that CLEARLY expresses the truth avoids abbreviations and doesn't shy away from  looong names.

Expressive code avoids comments. What? Do comments not make the code more understandable? No, they don't.

We don't need comments because we make the effort to write self explanatory code. If we feel the need to comment a function, we re-evaluate its naming and length instead and put the missing information into the code itself, so it becomes more expressive.

Typically, commented code takes longer to understand and comments diverge from the code as the code changes over time. Reading and maintaining comments is an unnecessary additional cognitive load that we don't put on ourselves or our fellow coders.

Comments also add another meta layer, as they are a description of a description of the truth. Not very effective.

The exception to the no-comments rule are comments that serve as documentation of a framework or public API.

For more on Clean Code, Uncle Bob's book[link] is a good reference.