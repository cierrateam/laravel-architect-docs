---
title: Getting Started
description: Getting started with Laravel Architect
extends: _layouts.documentation
section: content
---

# Getting Started {#getting-started}

Laravel Architect was created and is maintained by [Vittorio Emmermann](https://github.com/vittorioe), founder of [cierra](https://cierra.de/). It's a helper you can install globally or locally for individual packages. Laravel Architect is supposed to take care of recurring grunt work, like creating a Test Class for your laravel package. Here's an example, you can easily do this `architect make:test MyAwesomeTest` and Laravel Architect will create the Test Class for you - inside your package. How nice is that?!

- It is built on top of the [Laravel Zero](https://laravel-zero.com/).
- Installable global to your machine as general helper.
- Also useable locally in single projects.


## Installation

To install Laravel Architect we recommend to install it globally to gather the best usage of this package:<br />
`composer global require "cierrateam/laravel-architect"`<br/>
Then run `architect inspiring` to ensure the package is installed.

Alternatively, you can install it locally to a project:<br/>
`composer require "cierrateam/laravel-architect"`<br/>
But then you have to run `php vendor/bin/architect` instead of only `architect`. 
> Hint: Create an alias if you want to use it on the package layer to keep it easier for you.

### Create a new package
``` 
architect init
``` 
Then just answer the questions.


## Roadmap
- [x] Creating Packages with architect
- [x] Creating Tests with architect
- [ ] Creating Models, Controllers and migrations
- [ ] Customising stubs
- [ ] More options while creating packages
- [ ] Run package tests with architect
- [ ] Install local path packages with architect in projects

## License

Laravel Architect is open-source software licensed under the [MIT license](https://github.com/laravel-architect/laravel-architect/blob/stable/LICENSE.md).

## Credits
This package is made by cierra and is coded with support of community packages.

<a href="https://cierra.de">
    <img title="cierra" height="50" src="https://assets.website-files.com/5d481a8da904cda6ec05cf74/5d481a8da904cdba4d05cfad_cierra-logo.png" />
</a>

