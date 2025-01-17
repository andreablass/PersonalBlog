@php
    $colors = ['bg-blue-300', 'bg-green-300', 'bg-pink-300', 'bg-yellow-300', 'bg-purple-300', 'bg-red-300'];
    $color = $colors[array_rand($colors)];
@endphp

<a href="{{ $attributes['href'] }}" 
   class="inline-block text-sm text-white {{ $color }} border border-transparent hover:border-gray-300 px-4 py-1 rounded-full transition-all, no-underline  font-semibold font-sans text-shadow ">
    {{ $slot }}
</a>
