<x-layout.default>
    <article class="flex flex-col justify-start items-center pt-5">
        <x-prose>
            <div class="w-full max-w-4xl mx-auto px-4 sm:px-6 md:px-8 lg:px-10">
                <div class="container">

                    <div class="content-1">
                        <h1 class="text-3xl sm:text-4xl font-bold mb-6 text-center sm:text-left">@kt($page->title())</h1>
                    </div>

                    <div class="content-2 text-gray-600 font-thin">
                        <p class="text-lg sm:text-xl mb-6 text-center sm:text-left">@kt($page->subtitle()->html())</p>
                    </div>

                    <div class="content-3">
                        <div class="flex flex-col sm:flex-row items-center sm:items-start space-y-4 sm:space-y-0 sm:space-x-4 mb-6">
                            <a href="{{ $about->url() }}" class="flex items-center space-x-4 no-underline">
                                <img src="{{ $about->image()->url() }}" alt="Profile Picture" class="w-14 h-14 rounded-full object-cover">
                                <div class="flex items-center space-x-2 text-center sm:text-left">
                                    <p class="text-gray-600 font-extralight">@kt($page->name()->html())</p>
                                    <p class="text-gray-500 font-extralight">{{ $formattedDate }}</p>
                                </div>
                            </a>
                        </div>
                    </div>


                    <div class="content-4 mb-10">
                        @foreach ($page->blocks()->toBlocks() as $block)
                        <div id="{{ $block->id() }}" class="block block-type-{{ $block->type() }} ">
                            {!! $block !!}
                        </div>
                        @endforeach
                    </div>

                    <div class="content-5 p-4 mb-10">
                        @if($page->categories()->isNotEmpty())
                        <div class="flex flex-wrap justify-center sm:justify-start gap-4">
                            @foreach($page->categories()->split() as $category)
                            <x-categoriesColors.category :href="$page->url() . '?category=' . urlencode($category)">
                                {{ $category }}
                            </x-categoriesColors.category>
                            @endforeach
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </x-prose>
    </article>
</x-layout.default>
