<footer class="sticky border-gray-100 shadow-lg py-6 bg-white">
    <div class="container mx-auto flex flex-col md:flex-row justify-between items-center text-center md:text-left">
        <div class="mb-4 md:mb-0">
            <p>&copy; {{ date('Y') }} Andrea Blass. All rights reserved.</p>
        </div>
        <div class="flex flex-wrap justify-center md:justify-end space-x-4">
            @foreach(site()->footer()->toPages() as $page)
            <a href="{{ $page->url() }}" class="hover:text-gray-400">
                {{ $page->title() }}
            </a>
            @endforeach
        </div>
    </div>
</footer>
