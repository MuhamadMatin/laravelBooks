<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-y-6 gap-x-12">
    @forelse ($books as $book)
        <div
            class="flex flex-col overflow-hidden bg-white border border-gray-200 rounded-lg shadow-md md:flex-row max-h-50">
            <!-- Image -->
            <div>
                <img class="object-cover h-full max-w-32" src="{{ $book->getImage() }}" alt="{{ $book->name }}"
                    loading="lazy">
            </div>
            <div class="flex flex-col justify-center w-full p-5 bg-white md:px-2 md:py-5 ">
                <h5 class="font-semibold tracking-tight text-gray-900">{{ $book->name }}</h5>
                <div class="mb-4 font-thin">
                    <span class="text-gray-800">{{ $book->User->name }}</span>
                </div>
                <p class="mt-2 text-gray-700">{{ Str::limit($book->desk, 70) }}</p>
                <a wire:navigate href="{{ route('admin.books.show', $book) }}"
                    class="inline-flex items-center px-3 py-2 mt-2 text-sm font-medium text-center text-white transition duration-150 bg-indigo-500 rounded-lg ease-in-outs w-fit hover:bg-indigo-700">
                    Read more
                </a>
            </div>
        </div>
    @empty
        <p class="text-center text-gray-500">Book empty</p>
    @endforelse
</div>
