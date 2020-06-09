@extends('_layouts.master')

@section('body')
<section class="container max-w-6xl mx-auto px-6 py-10 md:py-12">
    <div class="flex flex-col-reverse mb-10 lg:flex-row lg:mb-24 text-center">
        <div class="mt-8">
            <h1 id="intro-docs-template">{{ $page->siteName }}</h1>

            <h2 id="intro-powered-by-jigsaw" class="font-light mt-4">{{ $page->siteDescription }}</h2>

            <p class="text-lg">How often did you miss "php artisan" on package layer? <br class="hidden sm:block">Start using artisan with architect.</p>

            <div class="flex my-10 justify-center">
                <a href="/docs/getting-started" title="{{ $page->siteName }} getting started" class="bg-blue-500 hover:bg-blue-600 font-normal text-white hover:text-white rounded mr-4 py-2 px-6">Get Started</a>

                <a href="https://cierra.de" target="_blank" title="cierra's Homepage" class="bg-gray-400 hover:bg-gray-600 text-blue-900 font-normal hover:text-white rounded py-2 px-6">About cierra</a>
            </div>
        </div>

        <img src="/assets/img/logo-large.svg" alt="{{ $page->siteName }} large logo" class="mx-auto mb-6 lg:mb-0 w-64 ">
    </div>

    <hr class="block my-8 border lg:hidden">

    <div class="md:flex -mx-2 -mx-4">
        <div class="mb-8 mx-3 px-2 md:w-1/2">
            <img src="/assets/img/icon-terminal.svg" class="h-12 w-12" alt="terminal icon">

            <h3 id="intro-markdown" class="text-2xl text-blue-900 mb-0">Use your CLI for <br>faster development</h3>

            <p>We all know it, we all love it: Our Terminal. Using the terminal is quite smooth while working with Laravel. We build a tool similar to artisan to improve the package building workflow.</p>
        </div>

        <div class="mx-3 px-2 md:w-1/2">
            <img src="/assets/img/icon-stack.svg" class="h-12 w-12" alt="stack icon">

            <h3 id="intro-mix" class="text-2xl text-blue-900 mb-0">Build your apps <br>using custom packages </h3>

            <p>Did you ever thought, "Wait, I developed this already in another project!"? I think you did. And if you would have this now as a package, available for installation, wouldn't that be incredible?</p>
        </div>
    </div>
</section>
@endsection
