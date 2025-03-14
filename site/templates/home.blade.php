<x-layout.default>
    <div class="max-w-screen-xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8 px-4 sm:px-10 md:px-20 mt-10">
        <div class="md:col-span-2 w-full">
            <section class="mt-8">
                <x-prose class="max-w-none">
                    <h2 class="text-3xl font-semibold text-gray-700">Latest Blog Posts</h2>
                    <ul class="mt-4 space-y-4">
                        @foreach ($articles as $article)
                        <a href="{{ $article->url() }}" class="no-underline flex flex-col sm:flex-row w-full">
                            <div class="flex-1">
                                <div class="text-2xl font-bold mb-3">
                                    {{ $article->title() }}
                                </div>
                                <div class="font-thin font-inter text-gray-600">
                                    {{ $article->abstract() }}
                                </div>
                            </div>
                            <img src="{{ $article->coverImage() ?? ' ' }}" class="ml-6 h-28 w-32 object-cover shadow-md">
                        </a>
                        <hr class="border-t border-gray-200">
                        @endforeach
                    </ul>
                </x-prose>
            </section>
        </div>

        <div class="md:col-span-1">
            <section class="mb-8">
                <h3 class="text-xl font-semibold text-gray-700">About the Blog</h3>
                <p class="text-gray-600 mt-2">{{ $page->about_text() }}</p>
            </section>
            <section class="mt-6">
                <h4 class="text-lg font-semibold">Categories:</h4>
                <div class="mt-2 flex flex-wrap gap-2">
                    @foreach ($categories as $category)
                    <x-categoriesColors.category :href="$page->url() . '?category=' . urlencode($category)">
                        {{ $category }}
                    </x-categoriesColors.category>
                    @endforeach
                </div>
            </section>
        </div>

        @if ($pagination->hasPages())
        <nav class="text-gray-700 flex flex-wrap justify-center md:justify-between w-full bg-white p-4 md:col-span-2 gap-4">
            @if ($pagination->hasPrevPage())
            <a href="{{ $pagination->prevPageUrl() }}" aria-label="Previous articles" class="text-black-500 no-underline">
                &larr; Previous articles
            </a>
            @else
            <span class="cursor-not-allowed text-gray-300" aria-hidden="true">
                &larr; Previous articles
            </span>
            @endif

            @if ($pagination->hasNextPage())
            <a href="{{ $pagination->nextPageUrl() }}" aria-label="Next articles" class="text-black-500 no-underline">
                Next articles &rarr;
            </a>
            @else
            <span class="cursor-not-allowed text-gray-300" aria-hidden="true">
                Next articles &rarr;
            </span>
            @endif
        </nav>
        @endif
    </div>
</x-layout.default>
