<x-layout.default>
    <div class="p-4 text-center font-semibold flex items-center justify-center min-h-screen">
        <div class="w-full max-w-lg">
            <section class="text-black">
                <h2 class="text-3xl font-semibold text-gray-700 pt-16 text-center p-10">Contact me</h2>
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-around text-center pt-6 space-y-6 sm:space-y-0 sm:space-x-8 text-gray-500">
                    <!-- Address -->
                    <div class="flex items-center space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                        </svg>
                        <p class="text-sm">@kt($page->address())</p>
                    </div>
                    <!-- Email -->
                    <div class="flex items-center space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 4.5h15v15H4.5z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 8.25l7.5 4.5 7.5-4.5" />
                        </svg>
                        <p class="text-sm">@kt($page->email())</p>
                    </div>
                    <!-- Phone -->
                    <div class="flex items-center space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                        </svg>
                        <p class="text-sm">@kt($page->phone())</p>
                    </div>
                </div>
            </section>

            <form class="grid w-full gap-4 pt-16" method="POST" action="{{$page->url()}}">
                <label>
                    <span class="sr-only">Name</span>
                    <input type="text" name="name" class="w-full rounded border border-gray-200 p-2" placeholder="Name *" required x-model="name" value="{{ $data['name'] ?? '' }}">
                </label>
                <label>
                    <span class="sr-only">Email</span>
                    <input type="email" name="email" class="w-full rounded border border-gray-200 p-2" placeholder="Email *" required x-model="email" value="{{ $data['email'] ?? '' }}">
                </label>
                <label>
                    <span class="sr-only">Comments</span>
                    <textarea name="comments" class="w-full rounded border border-gray-200 p-2" placeholder="Comments" x-model="comments">{{ $data['comments'] ?? '' }}</textarea>
                </label>
                <div>
                    <x-buttons.button href="{{ $page->url() }}">
                        <button type="submit">
                            Send
                        </button>
                    </x-buttons.button>
                </div>
                @if (isset($success) && $success === true)
                <div class="mt-4 rounded-lg border-2 border-green-700 bg-green-100 px-6 py-3 font-semibold text-green-900 shadow-lg transition-all duration-300 ease-in-out hover:bg-green-200">
                    {{ $message }}
                </div>
                @endif
            </form>
        </div>
    </div>
</x-layout.default>
