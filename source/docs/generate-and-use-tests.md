---
title: Generate and use tests
description: Generating and using tests with Laravel Architect
extends: _layouts.documentation
section: content
---

# Generate and use tests
If you initiated your package with laravel architect, you'll get a package shipped with the [orchestra testbench](https://github.com/orchestral/testbench) suite, completely configured to work with phpunit. It will automatically discover the directory `Tests/` for you and will run all files ending with the suffix `Test.php`.

## Generating new tests
To generate a new test you just have to run `architect make:test FooIsBarTest`. Please remember to change `FooIsBarTest` with the actual name of your test.<br>
This will generate an empty test for you:
```php
<?php

namespace Tests;

class FooIsBarTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}

```


## Using the tests
Using tests in a package is quite similar to normal Laravel tests. I'll not be too detailed here regarding the general usage of tests in a package environment, but here is a rough overwiew:</br>
### Running the tests
To run the tests you have to install the composer things first with `composer install`. Then you can run phpunit with `./vendor/bin/phpunit`.
> Hint: You should create an alias for it, I use this: `alias phpunit="vendor/bin/phpunit"`

### Custom Service Provider

To load your package service provider, override the `getPackageProviders`.

```php
protected function getPackageProviders($app)
{
    return ['Acme\AcmeServiceProvider'];
}
```

### Custom Aliases

To load your package alias, override the `getPackageAliases`.

```php
protected function getPackageAliases($app)
{
    return [
        'Acme' => 'Acme\Facade'
    ];
}
```

### Overriding setUp() method

Since `Orchestra\Testbench\TestCase` replace Laravel's `Illuminate\Foundation\Testing\TestCase`, if you need your own `setUp()` implementation, do not forget to call `parent::setUp()` and make sure proper declaration compatibility:

```php
/**
 * Setup the test environment.
 */
protected function setUp(): void
{
    parent::setUp();

    // Your code here
}
```

### Setup Environment

If you need to add something early in the application bootstrapping process (which executed between registering service providers and booting service providers) you could use the `getEnvironmentSetUp()` method, but we already configured some basic settings for you:

```php
/**
 * Define environment setup.
 *
 * @param  \Illuminate\Foundation\Application  $app
 * @return void
 */
protected function getEnvironmentSetUp($app)
{
    // Setup default database to use sqlite :memory:
    $app['config']->set('database.default', 'testbench');
    $app['config']->set('database.connections.testbench', [
        'driver'   => 'sqlite',
        'database' => ':memory:',
        'prefix'   => '',
    ]);
}
```

### Setup Environment using Annotation

New in Testbench Core 4.4 is the ability to use `@environment-setup` annotation to customise use of `getEnvironmentSetUp` specific for each test.

```php
protected function useMySqlConnection($app) 
{
    $app->config->set('database.default', 'mysql');
}

protected function useSqliteConnection($app)
{
    $app->config->set('database.default', 'sqlite');
}

/**
 * @environment-setup useMySqlConnection
 */
public function testItCanBeConnectedWithMySql()
{
    // write your tests
}

/**
 * @environment-setup useSqliteConnection
 */
public function testItCanBeConnectedWithSqlite()
{
    // write your tests
}
```


### Overriding Console Kernel

You can easily swap Console Kernel for application bootstrap by overriding `resolveApplicationConsoleKernel()` method:

```php
/**
 * Resolve application Console Kernel implementation.
 *
 * @param  \Illuminate\Foundation\Application  $app
 * @return void
 */
protected function resolveApplicationConsoleKernel($app)
{
    $app->singleton('Illuminate\Contracts\Console\Kernel', 'Acme\Testbench\Console\Kernel');
}
```

### Overriding HTTP Kernel

You can easily swap HTTP Kernel for application bootstrap by overriding `resolveApplicationHttpKernel()` method:

```php
/**
 * Resolve application HTTP Kernel implementation.
 *
 * @param  \Illuminate\Foundation\Application  $app
 * @return void
 */
protected function resolveApplicationHttpKernel($app)
{
    $app->singleton('Illuminate\Contracts\Http\Kernel', 'Acme\Testbench\Http\Kernel');
}
```

### Overriding Application Timezone

You can also easily override application default timezone, instead of the default `"UTC"`:

```php
/**
 * Get application timezone.
 *
 * @param  \Illuminate\Foundation\Application  $app
 * @return string|null
 */
protected function getApplicationTimezone($app)
{
    return 'Asia/Kuala_Lumpur';
}
```

### Using Migrations

Package developer should be using `ServiceProvider::loadMigrationsFrom()` feature to automatically handle migrations for packages.

```php
$this->artisan('migrate', ['--database' => 'testbench'])->run();
```

#### Using Laravel Migrations

By default Testbench doesn't execute the default Laravel migrations which include `users` and `password_resets` table. In order to run the migration just add the following command:

```php
$this->loadLaravelMigrations();
```

You can also set specific database connection to be used by adding `--database` options:

```php
$this->loadLaravelMigrations(['--database' => 'testbench']);
```

#### Running Testing Migrations

To run migrations that are **only used for testing purposes** and not part of your package, add the following to your base test class:

```php
/**
 * Setup the test environment.
 */
protected function setUp(): void
{
    parent::setUp();

    $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
    
    // and other test setup steps you need to perform
}
```