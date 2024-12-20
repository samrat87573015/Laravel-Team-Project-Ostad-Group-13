<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'OstadGroup13') }}</title>
        <link rel="shortcut icon" href="{{ asset('images/CP-Logo.png') }}" type="image/x-icon">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js"></script>
        <!--  axios -->
        <script src="https://cdn.jsdelivr.net/npm/axios@1.6.7/dist/axios.min.js"></script>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body>

        <x-header />

        <div class="font-sans text-gray-900 dark:text-gray-100 antialiased">
            {{ $slot }}
        </div>
  
        <x-footer />


        <script>

            const favicon = document.querySelectorAll('.favrict_icon');
            favicon.forEach(icon => {
              icon.addEventListener('click', () => {
              icon.classList.toggle('active');
              })
            })
          
          
          </script>

        @livewireScripts
    </body>
</html>
