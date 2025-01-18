<footer class=" sticky border-gray-100 shadow-lg  py-6">
    <div class="container mx-auto flex justify-between items-center">
        <div class="text-center">
            <p>&copy; {{ date('Y') }} Andrea Blass. All rights reserved.</p>
        </div>
        <div class="flex space-x-6">
            @foreach(site()->footer()->toPages() as $page)
            <a href="{{ $page->url() }}" class=" hover:text-gray-400">
                {{ $page->title() }}
            </a>
            @endforeach
        </div>
    </div>
</footer>
