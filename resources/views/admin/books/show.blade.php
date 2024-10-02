<x-app-layout>
    <div class="container p-6 mx-auto">
        <div class="overflow-hidden bg-white border border-gray-200 rounded-lg shadow-md">
            <div class="flex flex-col md:flex-row">
                <div class="md:w-1/3">
                    <img class="object-cover w-full h-full" src="{{ $book->image }}" alt="{{ $book->name }}">
                </div>
                <div class="p-5 md:w-2/3">
                    <h4 class="text-2xl font-semibold tracking-tight text-gray-900">{{ $book->name }}</h4>
                    <span class="flex items-center mt-4 gap-x-5">
                        <h5 class="text-gray-800">{{ $book->User->name }}</h5>
                        <a wire:navigate href="{{ route('admin.books.edit', $book) }}"
                            class="px-3 py-2 font-bold text-indigo-700 border-2 rounded-full">Edit Book
                        </a>
                        <a wire:navigate href="{{ route('admin.books.destroy', $book) }}"
                            class="px-3 py-2 border-2 rounded-full">
                            <svg class="w-5 h-5 stroke-red-500 fill-red-500" viewBox="0 0 24 24" fill=""
                                xmlns="http://www.w3.org/2000/svg" stroke="#ff0000">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path
                                        d="M9.1709 4C9.58273 2.83481 10.694 2 12.0002 2C13.3064 2 14.4177 2.83481 14.8295 4"
                                        stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path>
                                    <path d="M20.5001 6H3.5" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round">
                                    </path>
                                    <path
                                        d="M18.8332 8.5L18.3732 15.3991C18.1962 18.054 18.1077 19.3815 17.2427 20.1907C16.3777 21 15.0473 21 12.3865 21H11.6132C8.95235 21 7.62195 21 6.75694 20.1907C5.89194 19.3815 5.80344 18.054 5.62644 15.3991L5.1665 8.5"
                                        stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path>
                                    <path d="M9.5 11L10 16" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round">
                                    </path>
                                    <path d="M14.5 11L14 16" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round">
                                    </path>
                                </g>
                            </svg>
                        </a>
                    </span>
                    <p class="mt-2 text-gray-700">{{ $book->desk }}</p>
                </div>
            </div>
        </div>

        <!-- Chapter dan Pages -->
        <div class="mt-8">
            <span class="flex items-center gap-x-5">
                <h2 class="text-2xl font-semibold">Chapters</h2>
                <a wire:navigate href="" class="px-3 py-2 font-bold text-indigo-700 border-2 rounded-full">Add
                    Chapter and page
                </a>
            </span>
            <div class="mt-4">
                @forelse ($book->chapters as $chapter)
                    <div class="mb-6">
                        <span class="flex items-center gap-x-5">
                            <a wire:navigate
                                href="{{ route('chapter.show', [
                                    'book' => $book->slug,
                                    'chapter' => $chapter->slug,
                                ]) }}">
                                <h3 class="text-xl font-bold text-gray-900">{{ $chapter->name }}</h3>
                            </a>
                            <a wire:navigate href="{{ route('admin.chapter.edit', $chapter) }}"
                                class="px-3 py-2 font-bold text-indigo-700 border-2 rounded-full">Edit Chapter
                            </a>
                        </span>
                        <ul class="ml-4 list-disc list-inside">
                            @forelse ($chapter->pages as $page)
                                <span class="flex items-center gap-x-5">
                                    <a wire:navigate
                                        href="{{ route('page.show', [
                                            'book' => $book->slug,
                                            'chapter' => $chapter->slug,
                                            'page' => $page->slug,
                                        ]) }}">
                                        <li class="text-gray-700">{{ $page->name }}</li>
                                        <a wire:navigate href="{{ route('admin.page.edit', $page) }}"
                                            class="px-3 py-2 font-bold text-indigo-700 border-2 rounded-full">Edit
                                            Page
                                        </a>
                                    </a>
                                </span>
                            @empty
                                <li class="text-gray-500">No pages in this chapter.</li>
                            @endforelse
                        </ul>
                    </div>
                @empty
                    <p class="text-gray-500">No chapters available for this book.</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
