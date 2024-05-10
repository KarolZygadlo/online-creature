<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css'])
</head>
<body class="min-w-[350px]" id="zooming">
<div class="min-h-full">
    <nav class="border-b border-gray-200 bg-white">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 justify-between">
                <div class="flex">
                    <div class="flex flex-shrink-0 items-center">
                        <img class="mx-auto size-6 w-auto" src="{{ asset('logo.svg') }}" alt="Your Company"/>
                    </div>
                    <div class="hidden sm:-my-px sm:ml-6 sm:flex sm:space-x-8">
                        <a href="#" class="border-sky-600 text-gray-900 inline-flex items-center border-b-2 px-1 pt-1 text-sm font-medium" aria-current="page">OCR</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile menu -->
        <div class="sm:hidden" id="mobile-menu">
            <div class="space-y-1 pb-3 pt-2">
                <a href="#" class="border-sky-600 bg-sky-50 text-sky-700 block border-l-4 py-2 pl-3 pr-4 text-base font-medium" aria-current="page">OCR</a>
            </div>
        </div>
    </nav>

    <div>
        <main>
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
            @yield('content')
            </div>
        </main>
    </div>
</div>

<script src="https://unpkg.com/htmx.org@1.9.12" integrity="sha384-ujb1lZYygJmzgSwoxRggbCHcjc0rB2XoQrxeTUQyRjrOnlCoYta87iKBWq3EsdM2" crossorigin="anonymous"></script>
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
@stack('scripts')
</body>
