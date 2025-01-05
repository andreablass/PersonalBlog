<x-layout.default :site="$site" :page="$page">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 p-6">
        <div class="md:col-span-2">
            <section>
                <h1 class="text-3xl font-bold text-gray-800">{{ $page->title() }}</h1>
                <p class="text-lg text-gray-600 mt-2">{{ $page->subtitle() }}</p>
            </section>

            <section class="mt-8">
                <h2 class="text-2xl font-semibold text-gray-700">Latest Blog Posts</h2>
                <ul class="mt-4 space-y-4">
                    <li class="border-b pb-4">
                    <!-- post recientes -->
                    </li>
                </ul>
            </section>
        </div>

        <div>
            <section class="mb-8">
                <h3 class="text-xl font-semibold text-gray-700">About the Blog</h3>
                <p class="text-gray-600 mt-2">{{ $page->about_text() }}</p>
            </section>
        </div>
    </div>
</x-layout.default>
