<footer class=" sticky border-gray-100 shadow-lg  py-6 border-gray-100 shadow-lg">
    <div class="container mx-auto flex justify-between items-center">
        <div class="text-center">
            <p>&copy; {{ date('Y') }} Andrea Blass. All rights reserved.</p>
        </div>
        <div class="flex space-x-6">
            <a href="{{ page('about')->url() }}" class=" hover:text-gray-400">About Me</a>
            <a href="{{ page('contact')->url() }}" class=" hover:text-gray-400">Contact</a>
        </div>
    </div>
</footer>
