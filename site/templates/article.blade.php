<x-layout.default>
    <article class="flex flex-col justify-start items-center pt-5">
        <x-prose>
            <div class="w-full max-w-4xl mx-auto p-4">
                <div class="container">
                    <div class="content-1 ">
                        <h1 class="text-4xl font-bold mb-8">@kt($page->title())</h1>
                    </div>
                    <div class="content-2 font-Inter font-thin text-gray-600">
                        <p class="text-xl mb-8">@kt($page->subtitle()->html())</p>
                    </div>
                    <div class="content-3">
                        <div class="flex items-center space-x-4 mb-4">
                            <img src="{{ $about->image()->url() }}" alt="Profile Picture" class="w-12 h-12 rounded-full object-cover">
                            <p class="text-gray-600 font-Poppins font-extralight">@kt($page->name()->html())</p>
                            <p class="text-gray-500 font-Poppins  font-extralight">{{ $formattedDate }}</p>
                        </div>
                    </div>
                    <div class="content-4 mb-14">
                        @foreach ($page->blocks()->toBlocks() as $block)
                        <div id="{{ $block->id() }}" class="block block-type-{{ $block->type() }} ">
                            {!! $block !!}
                        </div>
                        @endforeach
                    </div>
                    <div class="content-5 p-4 mb-14">
                        @if($page->categories()->isNotEmpty())
                        <div class="flex space-x-4 mb-4">
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
