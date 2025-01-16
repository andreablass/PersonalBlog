<x-layout.default>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 p-6 ml-20 mr-20 mt-10">
        <div class="md:col-span-2">
            <section class="mt-8">
                <x-prose>
                    <h2 class="text-3xl font-semibold text-gray-700">Latest Blog Posts</h2>
                    <ul class="mt-4 space-y-4">
                        @foreach ($articles as $article)
                        <a href="{{ $article->url() }}" class="no-underline flex w-full">
                            <div class="flex-1">
                                <div class="text-2xl font-bold mb-3">
                                    {{ $article->title() }}
                                </div>
                                <div class="text-base font-serif text-gray-500">
                                    {{ $article->subtitle() }}
                                </div>
                            </div>
                            <img src="{{ $article->image()->url() }}" alt="{{ $article->title() }}" class="w-32 h-28 object-cover shadow-md ml-6">
                        </a>
                        <hr class="border-t border-gray-200">
                        @endforeach
                    </ul>
                </x-prose>
            </section>
        </div>

        <div>
            <section class="mb-8">
                <h3 class="text-xl font-semibold text-gray-700">About the Blog</h3>
                <p class="text-gray-600 mt-2">{{ $page->about_text() }}</p>
            </section>
            <section class="mt-6">
                <h4 class="text-lg font-semibold">Categories:</h4>
                <div class="mt-2 flex flex-wrap gap-2">
                    @foreach ($categories as $category)
                    <a href="{{ $page->url() }}" class="inline-block bg-gray-100 text-sm text-gray-700 px-4 py-1 rounded-full border border-gray-300 hover:bg-gray-200 hover:text-black transition-all">
                        {{ $category }}
                    </a>
                    @endforeach
                </div>
            </section>
        </div>
    </div>
</x-layout.default>
