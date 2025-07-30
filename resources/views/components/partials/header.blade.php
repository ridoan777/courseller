<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <title>Laravel</title>

   <!-- Fonts -->
   <link rel="preconnect" href="https://fonts.bunny.net">
   <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

   <!-- Styles / Scripts -->
   @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
   @vite(['resources/css/app.css', 'resources/js/app.js'])
   @else
   @endif
</head>