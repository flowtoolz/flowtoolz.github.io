---
title: "24 Reasons For Why I Hate Xcode's Interface Builder"
layout: post
excerpt: "The road to complexity hell is plastered with well intended technologies. And so the promises of the Interface Builder are an illusion."
image_url: /blog-images/software-development/xcode-interface-builder/no-apple-xcode-interface-builder.jpg
keywords: Apple, Xcode, interface builder, Swift, auto layout, iOS, macOS, SwiftUI, UIKit, AppKit, UI, user interface, design, programming, mobile apps, software architecture
---

<img style="margin-left:auto;margin-right:auto;display:block;" src="/blog-images/software-development/xcode-interface-builder/no-apple-xcode-interface-builder.jpg" title="{{ page.title }}" alt="{{ page.title }}. {{ page.keywords }}">

<!-- todo: the fundamental problem that causes the 24 symptoms; referenz zu architecture posts; SwiftUI; complexity & FRICTION POINTS -->

Why am I such a hater on the Interface Builder? I'm glad you ask! An even better question is: Why would any **professional** use Interface Builder? IB may help to build simple rough prototypes. It is really no option for professional apps.

So here is what you get using the Interface Builder, according to my experience across multiple professional projects:

1. The IB is slow. Opening and loading a storyboard usually has a significant delay.
2. The IB does not make it obvious where configurations deviate from defaults, i.e. where they have been manipulated by a developer.
3. Handleing complex interfaces through pointing, zooming, scrolling and selecting, intertwined with keyboard input is actually pretty fucking slow.
4. Algorithmic (dynamic/generic) layouts are impossible. However, often the mere existence of a view is determined at runtime, or layouts depend on data.
5. What constraints are actually applied is less explicit, in particular in the context of the code.
6. IB files create a mess with collaboration and version control systems like git.
7. IB files mess up the architecture I: They entangle the logical definition of the interface (which constitutes something like a "view model") with highly system specific file formats.
8. IB files mess up the architecture II: They entangle the logical definition of screen flow (high level navigation) with highly system specific file formats.
9. Setting very specific constraints with multipliers etc. and also debugging layout issues are a nightmare with the IB.
10. Coding animations often requires to access or even replace constraints. Good luck doing that when using the IB!
11. There are more initializers to worry about as well as the general interoperation between code and IB files.
12. Communicating with views requires to create outlets, which is actually quite cumbersome.
13. Your app will be harder to port to other platforms, even within the Apple universe.
14. It is more cumbersome to turn views into reusable custom views when they live in IB files. This also leads to massive view controllers.
15. You'll encounter a bunch of issues when trying to package IB files into frameworks and Cocoapods.
16. Subviews are optional. Either you unwrap them everytime or you make them implicitly unwrapped. The latter option is common practice but can (and did in client projects) lead to crashes.
17. It is impossible to pass parameters to custom designated initializers of your views and view controllers. This stark limitation can compromise clean design and architecture.
18. The Refactor-Rename function in Xcode will not always rename all outlet connections in IB files, leading to crashes. You'll need to reconnect renamed outlets by hand.
19. You'll deal with a whole new type of "compilation" error, which is also opaque and hard to debug:
	![storyboard_compilation_error](/blog-images/software-development/xcode-interface-builder/storyboard_compilation_error.png)
20. Designing custom view classes through the IB is cumbersome and requires to use IB "designables". Plus:
	* IB must recompile your whole project in order to display these designables, which makes the IB performance problems even worse. 
	* `@IB_Designable` is not well documented by Apple.
	* `@IB_Designable` rendering causes its own type of build errors:
		![designable_rendering_error](/blog-images/software-development/xcode-interface-builder/ib_designable_rendering_error.png)
21. IB will not recognize when you move a referenced class to another module (framework, cocoapod etc.). If you forget to adapt the module manually in IB, you'll be surprised by chrashes.
22. It's impossible to define insets, offsets, multipliers, sizes, colors, fonts etc. in one place as part of a style. Much less can you compute them dynamically, for instance to depend on screen size, device type or user preference.
23. Using the IB makes code harder to debug. For instance, setting a breakpoint in a view's or view controller's initializer won't tell you what triggered the creation of that object. Also, you can't search for a term like `MyView(` in your project to find all uses/clients of that view class.
24. Using the IB will make it harder to migrate to more modern technologies like SwiftUI.