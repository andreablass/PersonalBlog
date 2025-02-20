<x-layout.default>
    <article class="flex flex-col items-center justify-center pt-16">
        <div class="w-full max-w-4xl mx-auto p-4 text-center">
            <h1 class="text-4xl font-bold mb-4">{{ $page->title() }}</h1>
            <h2 class="text-xl mb-6">{{ $page->subtitle() }}</h2>
            <div class="flex justify-center items-center mt-8">
                <img src="{{ $page->image()->url() }}" alt="Profile Picture" class="w-48 h-48 rounded-full object-cover border-4 border-gray-300 shadow-lg">
            </div>
            <div class="flex justify-center space-x-4 mt-8">
                @foreach ($page->social()->toStructure() as $social)
                <a href="{{ $social->url() }}" class="social-icon">
                    @if (in_array(strtolower($social->platform()), ['linkedin']))
                    <img src="public/images/linkedin.png" alt="LinkedIn Icon" class="w-8 h-8 object-cover rounded shadow-lg">
                    @elseif (in_array(strtolower($social->platform()), ['twitter', 'x']))
                    <img src="public/images/x.png" alt="Twitter Icon" class="w-8 h-8 object-cover rounded shadow-lg">
                    @endif
                </a>
                @endforeach
            </div>
        </div>
    </article>
</x-layout.default>
