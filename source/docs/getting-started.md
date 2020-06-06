---
title: Getting Started
description: Getting started with Laravel Architect
extends: _layouts.documentation
section: content
---

# Getting Started {#getting-started}

Laravel Architect was created by, and is maintained by [Vittorio Emmermann](https://github.com/vittorioe), founder of [cierra](https://cierra.de/). It's a helper you can install globally or locally for individual packages. Laravel Architect is supposed to take care of recurring grunt work, like creating a Test Class for your laravel package. Here's an example, you can easily do this `architect make:test MyAwesomeTest` and Laravel Architect will create the Test Class for you - inside your package. How nice is that?!

- Built on top of the [Laravel Zero](https://laravel-zero.com/).
- Installable global to your machine as general helper.
- Also useable locally in single projects.


## Installation

To install Laravel Architect we recomment to install it globally to gather the best usage of this package:<br />
`composer global require "cierrateam/laravel-architect"`<br/>
Then run `architect inspiring` to ensure the package is installed.

Alternatively you can install it locally to a project:<br/>
`composer require "cierrateam/laravel-architect"`<br/>
But then you hace to run `php vendor/bin/architect` instead of only `architect`. 
> Hint: Create an alias if you want to use it on the package layer to keep it easier for you.

