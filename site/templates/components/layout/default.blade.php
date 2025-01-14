<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ site()->title() }} | {{ page()->title() }}</title>

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="min-h-screen flex flex-col">
        <x-navigation.header title="Header" />
        <main class="pt-16 flex-1 p-4">
            {{ $slot }}
        </main>
        <x-footer.footer title="Footer" />
    </div>
</body>
</html>
