<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="{{ asset('vendor/specify/specify.css') }}">
        <script src="{{ asset('vendor/specify/specify2.js') }}" defer></script>

        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
        <!-- Scripts -->
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('specify::navigation')

            <!-- Page Heading -->
            <div class="container mx-auto flex flex-col gap-2 lg:flex-row">
                <div class="w-full lg:w-2xs">
                    @include('specify::sidebar')
                </div>
                <!-- Page Content -->
                <main class="w-full lg:max-w-3/4">
                    @yield('content')
                </main>
            </div>

            @stack('scripts')
        </div>
    </body>
</html>
