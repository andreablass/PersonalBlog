<x-layout.default :site="$site" :page="$page">
    <article class="flex flex-col justify-start items-center pt-5">
        <x-prose>
            <div class="w-full max-w-4xl mx-auto p-4">
                <h1 class="text-4xl font-bold mb-4">@kt($page->title())</h1>
                <div class="flex items-center space-x-4 mb-8">
                    <img src="resources/images/profile.jpg" class="w-12 h-12 rounded-full object-cover">
                    <p class="text-gray-500">Andrea Blass Ene 8, 2025</p>
                </div>
                <p class="text-xl mb-8">@kt($page->subtitle()->html())</p>

                @foreach ($page->myBlocksField()->toBlocks() as $block)
                <div id="{{ $block->id() }}" class="block block-type-{{ $block->type() }}">
                    {!! $block !!}
                </div>
                @endforeach


                @if($page->categories()->isNotEmpty())
                <div class="flex space-x-4 mb-4">
                    @foreach($page->categories()->split() as $category)
                    <span class="text-sm text-gray-600 bg-gray-100 px-4 py-2 rounded-full">{{ $category }}</span>
                    @endforeach
                </div>
                @endif
            </div>
        </x-prose>
    </article>
</x-layout.default>
