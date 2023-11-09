<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Estates</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/nprogress/0.2.0/nprogress.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" />
    @routes
    @vite('resources/js/app.js')
    @inertiaHead
</head>

{{-- for dark mode --}}
<body class="bg-white dark:bg-gray-900 text-gray-800 dark:text-gray-300">
    @inertia
    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"></script>
    <script src="{{ mix('/js/app.js') }}" defer></script>
</body>

</html>
