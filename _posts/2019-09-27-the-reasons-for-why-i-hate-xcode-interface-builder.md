---
title: "25 Reasons For Why I Hate Xcode's Interface Builder"
layout: post
excerpt: "The road to complexity hell is plastered with well intended technologies. And so the promises of the Interface Builder are an illusion."
image_url: /blog-images/software-development/xcode-interface-builder/no-apple-xcode-interface-builder.png
keywords: Apple, Xcode, interface builder, Swift, auto layout, iOS, macOS, SwiftUI, UIKit, AppKit, UI, user interface, design, programming, mobile apps, software architecture
---

<img style="margin-left:auto;margin-right:auto;display:block;" src="/blog-images/software-development/xcode-interface-builder/no-apple-xcode-interface-builder.png" title="{{ page.title }}" alt="{{ page.title }}. {{ page.keywords }}">

<!-- todo: the fundamental problem that causes the 24 symptoms; referenz zu architecture posts; SwiftUI; complexity & FRICTION POINTS -->

The road to complexity hell is plastered with well intended technologies. And after having dealt with Apple Xcode's Interface Builder in every client project, I'm convinced its promises are an illusion.

So why am I such a hater on the Interface Builder? An even better question is: Why would any **professional** use Interface Builder? IB *may* (I'm not even sure about that) help to build simple rough prototypes. It is really no option for professional apps.

So here is what you get using the Interface Builder, according to my experience across multiple professional projects:

1. Because you have to draw a line somewhere between visual editing and coding, and because many views can't be represented in IB files (due to custom drawing, dynamic layouts, animations, views from external frameworks etc.), IB files **virtually never** provide a good idea of how a screen will actually look, which defeats much of the IB's purpose. In practice, most storyboards look something like this:
	![storyboard_compilation_error](/blog-images/software-development/xcode-interface-builder/storyboard.jpg)
	
2. The IB is slow. Opening and loading a storyboard usually has a significant delay.

3. The IB does not make it obvious where configurations deviate from defaults, i.e. where they have been manipulated by a developer.

4. Handleing complex interfaces through pointing, zooming, scrolling and selecting, intertwined with keyboard input is actually pretty fucking slow.

5. Algorithmic (dynamic/generic) layouts are impossible. However, often the mere existence of a view is determined at runtime, or layouts depend on data.

6. What constraints are actually applied is less explicit, in particular in the context of the code.

7. IB files create a mess with collaboration and version control systems like git.

8. IB files mess up the architecture I: They entangle the logical definition of the interface (which constitutes something like a "view model") with highly system specific file formats.

9. IB files mess up the architecture II: They entangle the logical definition of screen flow (high level navigation) with highly system specific file formats.

10. Setting very specific constraints with multipliers etc. and also debugging layout issues are a nightmare with the IB.

11. Coding animations often requires to access or even replace constraints. Good luck doing that when using the IB!

12. There are more initializers and functions like `prepare(for segue: ...)` to worry about as well as the general interoperation between code and IB files.

14. Communicating with views requires to create outlets, which is actually quite cumbersome.

15. Your app will be harder to port to other platforms, even within the Apple universe.

16. It is more cumbersome to turn views into reusable custom views when they live in IB files. This also leads to massive view controllers.

17. You'll encounter a bunch of issues when trying to package IB files into frameworks and Cocoapods.

18. Subviews are optional. Either you unwrap them everytime or you make them implicitly unwrapped. The latter option is common practice but can (and did in client projects) lead to crashes.

19. It is impossible to pass parameters to custom designated initializers of your views and view controllers. This stark limitation can compromise clean design and architecture.

20. The Refactor-Rename function in Xcode will not always rename all outlet connections in IB files, leading to crashes. You'll need to reconnect renamed outlets by hand.

21. You'll deal with a whole new type of "compilation" error, which is also opaque and hard to debug:
   ![storyboard_compilation_error](/blog-images/software-development/xcode-interface-builder/storyboard_compilation_error.png)

22. Designing custom view classes through the IB is cumbersome and requires to use IB "designables". Plus:
   * IB must recompile your whole project in order to display these designables, which makes the IB performance problems even worse. 
   * `@IB_Designable` is not well documented by Apple.
   * `@IB_Designable` rendering causes its own type of build errors:
   	![designable_rendering_error](/blog-images/software-development/xcode-interface-builder/ib_designable_rendering_error.png)

23. IB will not recognize when you move a referenced class to another module (framework, cocoapod etc.). If you forget to adapt the module manually in IB, you'll be surprised by chrashes.

24. It's impossible to define insets, offsets, multipliers, sizes, colors, fonts etc. in one place as part of a style. Much less can you compute them dynamically, for instance to depend on screen size, device type or user preference.

25. Using the IB makes code harder to debug. For instance, setting a breakpoint in a view's or view controller's initializer won't tell you what triggered the creation of that object. Also, you can't search for a term like `MyView(` in your project to find all uses/clients of that view class.

26. Using the IB will make it harder to migrate to more modern code-based and declarative technologies like SwiftUI.