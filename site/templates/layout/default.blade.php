<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $site->title() }} | {{ $page->title() }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <main class="pt-16">
        {{ $slot }}
    </main>  
</body>
</html>
