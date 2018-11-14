---
title: "Zen in the Art of Software Architecture, Part 1"
layout: post
excerpt: "An excerpt from the introduction to ”Zen in the Art of Software Architecture”, a book I'm writing. Get a feel for tone and content. Much more will come."
image_url: /blog-images/software-development/architecture/zen-architecture.jpg
keywords: software architecture, software, architecture, zen, code quality, software quality, book, software development, architecture pattern, design pattern
---

<img style="margin-left:auto;margin-right:auto;display:block;"
    src="/blog-images/software-development/architecture/zen-architecture.jpg"
    title="{{ page.title }}"
    alt="{{ page.title }}. {{ page.keywords }}"
    class="ft-shadow">
    
<i>This is a series of excerpts from a book draft on software architecture. The content will evolve, and I'll even rework published content without highlighting every edit.</i>

## Are We Having Fun Yet?

When I was eleven years old, I teached myself Pascal, and shortly after C++. I remember building wild over-engineered little monsters of code.

Again and again, those games, game engines and architectural frameworks would lead into dead ends, where  their structure hopelessly diverged from their purpose and their complexity brought them to a halt.

And again and again I started all over, wondering: How on earth is real professional software even possible? There must be some system or secret that I still don't know.

And I pursued the answer to those fundamental questions ever since. The abstract principles of software development have always intrigued me far more than its technical details.
 
To my surprise, I didn't find answers at universities. Process- and architecture related courses did not reflect modern reality. Software engineering, as it was presented to us, was [kind of dead](https://www.computer.org/cms/Computer.org/ComputingNow/homepage/2009/0709/rW_SO_Viewpoints.pdf) 10 years ago.

So, I went on a journey of working on code, analyzing code, reading about code and thinking deeply about the nature of code structure. Writing down and integrating everything I learned, a theoretical framework emerged. It is abstract but simple and pragmatic, and I use it to understand and (re-)factor all my projects. I feel it actually goes deeper than software and maybe touches on some principles of life, we'll see.

This is a deeply systematic book. But: I won't rattle down a longwinded proof and reference list for every statement I make. It's not an academic text. I don't have time for that, and neither have you. For the sake of brevity and practical value, let's focus on the essential line of reasoning. I'll sound opinionated, and you'll be motivated. More fun for both of us :)

## Where We're Coming From

As proud software craftsmen, we think customer-centric, design domain-driven, implement test-driven, develop behaviour-driven, structure object-oriented, integrate automatically, iterate rapidly and deliver continuously, some even burn out recurringly, fine.

Some of these techniques are quite far down the pipeline, but no amount of automated testing and rapid iteration can make up for fundamentally flawed code coming in. Everything starts with- and builds upon quality code.

However, most code-related techniques are quite low-level. The domain model is just one part of the application, object-oriented design principles have mostly local scope, and a thousand perfect little TDD cycles with perfect little tests and refactorings can still amount to a mess in the big picture.

That's why developers crave higher-level frameworks and models to guide their micro decisions. And that's where the A-word comes in: architecture.

Now, let's not get bogged down by definitions. You already have an intuitive understanding of "software architecture". It's a fuzzy term, and we'll deconstruct it anyway.

## Architecture Pattern Recognition

I bet you're already a little "architect" like me, aiming at code monuments of sheer beauty, why else would you pick up a book with such a pretentious title? But what we think is optimal or what feels beautiful isn't necessarily that by the true nature of the subject matter and its intrinsic standards.

When developing software, we often cling to a so called "architecture" without really knowing why. Compliance with an architecture pattern yields consistency and beauty in terms of that pattern but not necessarily in terms of the nature of software itself.

For instance, [Model-View-Presenter](https://en.wikipedia.org/wiki/Model–view–presenter) is not an "architecture". It's a subjective observation, a simplified model of reality, a perceived pattern.

Such a pattern is descriptive, not normative. It describes a regularity that emerges in clean architectures. The pattern is ultimately a consequence of clean design. It is not the basis or cause for clean design.

There are myths in our field that we've conjured up through blind adherence to observed patterns. But when you turn an observation into a dogma, you've lost the way.

Here are just 10 myths:

1. Views must not access models
2. App state (and structs) must be immutable
3. Everything must be unit-tested
4. Independence is for re-usability
5. The model is the state of the app
6. Singletons are bad
7. Views must have no behaviour
8. View controllers are the only acceptable "manager" type of class
9. The view model layer is only for output
10. Different "architectures" are mutually exclusive

<p></p>

## Where We're Going

In this book, I won't directly "challenge" such myths. But when we're able to put them in perspective and understand where they come from, they appear small-minded, arbitrary, over-restrictive and needlessly confusing.

So, instead of promoting some new "architecture", I will lay out a wider thought framework that can relate and explain the patterns we know.

Equipped with deep clarity about the fundamental principles of code structure, the patterns and rules we think of as "architecture" will dissolve and become non-issues. How to architect clean software systems and how to integrate different approaches will be obvious.

And it should be obvious because software, at its core, is surprisingly simple. Just like life. We'll see that much of it comes down to telling the truth. Code, like speech, must be truthful. Then, it's efficient, lean, simple and beautiful.

When your solution is complex, chances are it's not sophisticated but just clumsy. Chances are you haven't thought the problem through just yet. Welcome to Zen in the Art of Software Architecture.
