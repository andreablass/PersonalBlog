<x-layout.default>
    <div class="p-4 text-center font-semibold flex items-center justify-center">
        <div class="w-full max-w-lg">
                <h2 class="text-3xl font-semibold text-black-700 pt-16">Contact me</h2>
            <form class="grid w-full gap-4 pt-16" method="POST" action="{{$page->url() }} ">
                <label>
                    <span class="sr-only">Name</span>
                    <input type="text" name="name" class="w-full rounded border border-gray-200 " placeholder="Name *" required x-model="name" value="{{ $data['name'] ?? '' }}">
                    @if (isset($errors['name']))
                    <span class="mt-2 bloc text-sm text-red-500">{{ $errors[ 'name' ] }}</span>
                    @endif
                </label>

                <label>
                    <span class="sr-only">Email</span>
                    <input type="email" name="email" class="w-full rounded border border-gray-200" placeholder="Email *" required x-model="email" value="{{ $data['email'] ?? '' }}"> <!-- ?? ' ' pone un valor por defecto por si no existe para no generar error -->
                    @if (isset($errors['email']))
                    <span class="mt-2 bloc text-sm text-red-500">{{ $errors[ 'email' ] }}</span>
                    @endif
                </label>

                <label>
                    <span class="sr-only">Comments</span>
                    <textarea name="comments" class="w-full rounded border border-gray-200" placeholder="Comments" x-model="comments">{{ $data['comments'] ?? '' }}</textarea>
                    @if (isset($errors['comments']))
                    <span class="mt-2 bloc text-sm text-red-500">{{ $errors[ 'comments' ] }}</span>
                    @endif
                </label>

                <div>
                    <x-buttons.button href="{{ $page->url() }}">
                        <button type="submit">
                            Send
                        </button>
                    </x-buttons.button>

                    @if (isset($success) && $success === true)
                    <div class="mt-4 rounded-lg border-2 border-green-700 bg-green-100 px-6 py-3 font-semibold text-green-900 shadow-lg transition-all duration-300 ease-in-out hover:bg-green-200">
                        {{ $message }}
                    </div>
                    @endif
                </div>
            </form>
        </div>
    </div>
</x-layout.default>
