<div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-y-6 gap-x-14">
    @forelse ($books as $book)
        <div
            class="relative overflow-hidden transition-all duration-300 ease-in-out bg-white border border-gray-200 rounded-lg shadow-md group min-h-80">
            <!-- Image -->
            <img class="object-cover w-full transition-all duration-300 ease-in-out h-80 lg:group-hover:h-full group-active:h-full"
                src="{{ $book->getImage() }}" alt="{{ $book->name }}" loading="lazy">
            <div
                class="absolute inset-0 flex flex-col justify-center p-5 py-5 transition-opacity duration-300 bg-white opacity-0 bg-opacity-90 lg:group-hover:opacity-100 group-active:opacity-100">
                <h5 class="font-semibold tracking-tight text-gray-900">{{ $book->name }}</h5>
                <div class="mb-4 font-thin">
                    <span class="text-gray-800">{{ $book->User->name }}</span>
                </div>
                <p class="mt-2 text-gray-700 whitespace-normal">{{ Str::limit($book->desk, 70) }}</p>
                <a wire:navigate href="{{ route('books.show', $book->slug) }}"
                    class="inline-flex items-center px-3 py-2 mt-2 text-sm font-medium text-center text-white transition duration-150 bg-indigo-500 rounded-lg ease-in-outs w-fit hover:bg-indigo-700">
                    Read more
                </a>
            </div>
        </div>
    @empty
        <p class="text-center text-gray-500">Book empty</p>
    @endforelse
</div>
