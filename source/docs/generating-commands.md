---
title: Generating Commands
description: Generating console command files with Laravel Architect
extends: _layouts.documentation
section: content
---

# Generating commands 
If you want to have commands installed with your package you just have to do three things:<br>
1. Generate the file<br>
2. Register the command in your Service Provider<br>
3. Write your logic<br>

## Generate the file
Generating the file is easy with laravel architect. You just have to go to your cli in the root folder of your package and type:
`architect make:command CommandName`
> You have to replace `CommandName` with the actual command name you want to get.

## Register the command in your Service Provider
The next step is to register this command. Your app have to be informed about it. To do so:  Open the service provider, it can be found in the `src/` directory of your package and is named like your app with a `ServiceProvivider` suffix.
There you have to add to your mount method the command. This could look like this:
```php
/**
 * Bootstrap the application services.
 *
 * @return void
 */
public function boot()
{
    // Just register them if your app is running in console
    if ($this->app->runningInConsole()) { 
        $this->commands([
            // The full classname of your command, make sure you'd import them.
            FooCommand::class, 
            BarCommand::class,
        ]);
    }
}
```
For further information check out following docs: [Laravel Docs - Package development](https://laravel.com/docs/7.x/packages#commands)

## Write your logic
First, adjust the command's signature. This is the unique identifier that your users will have to type into the CLI. If your signature is `foo:make` you can call your command with `php artisan foo:make` later.<br>
For further information check out this link to the [Laravel Docs](https://laravel.com/docs/7.x/artisan#writing-commands)