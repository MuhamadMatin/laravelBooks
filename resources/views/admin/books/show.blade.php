<x-app-layout>
    <div class="container p-6 mx-auto">
        <div class="overflow-hidden bg-white border border-gray-200 rounded-lg shadow-md">
            <div class="flex flex-col md:flex-row">
                <div class="md:w-1/3">
                    <img class="object-cover w-full h-full" src="{{ $book->getImage() }}" alt="{{ $book->name }}">
                </div>
                <div class="p-5 md:w-2/3">
                    <h4 class="text-2xl font-semibold tracking-tight text-gray-900">{{ $book->name }}</h4>
                    <span class="flex items-center mt-4 gap-x-5">
                        <livewire:like-book :key="$book->id" :book="$book" />
                        <h5 class="text-gray-800">{{ $book->User->name }}</h5>
                        @can('edit_book')
                            <a wire:navigate href="{{ route('admin.books.edit', $book) }}"
                                class="px-3 py-2 font-bold text-indigo-700 border-2 rounded-full">Edit Book
                            </a>
                        @endcan
                        @can('delete_book')
                            <form action="{{ route('admin.books.destroy', $book) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-3 py-2 font-bold text-red-700 border-2 rounded-full">
                                    Delete
                                </button>
                            </form>
                        @endcan
                        <label class="flex items-center gap-1">
                            @if (!$book->show)
                                <svg class="w-4 h-4" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 460.775 460.775"
                                    xml:space="preserve">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path
                                            d="M285.08,230.397L456.218,59.27c6.076-6.077,6.076-15.911,0-21.986L423.511,4.565c-2.913-2.911-6.866-4.55-10.992-4.55 c-4.127,0-8.08,1.639-10.993,4.55l-171.138,171.14L59.25,4.565c-2.913-2.911-6.866-4.55-10.993-4.55 c-4.126,0-8.08,1.639-10.992,4.55L4.558,37.284c-6.077,6.075-6.077,15.909,0,21.986l171.138,171.128L4.575,401.505 c-6.074,6.077-6.074,15.911,0,21.986l32.709,32.719c2.911,2.911,6.865,4.55,10.992,4.55c4.127,0,8.08-1.639,10.994-4.55 l171.117-171.12l171.118,171.12c2.913,2.911,6.866,4.55,10.993,4.55c4.128,0,8.081-1.639,10.992-4.55l32.709-32.719 c6.074-6.075,6.074-15.909,0-21.986L285.08,230.397z">
                                        </path>
                                    </g>
                                </svg>Not Show
                            @else
                                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path d="M4 12.6111L8.92308 17.5L20 6.5" stroke="#000000" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                    </g>
                                </svg> Show
                            @endif
                        </label>
                    </span>
                    <p class="mt-2 text-gray-700">{{ $book->desk }}</p>
                </div>
            </div>
        </div>

        <!-- Chapter dan Pages -->
        <div class="mt-8">
            <span class="flex items-center gap-x-5">
                <h2 class="text-2xl font-semibold">Chapters</h2>
                <a wire:navigate href="{{ route('admin.books.index') }}"
                    class="px-3 py-2 font-bold text-yellow-500 border-2 rounded-full">Back
                </a>
                @can('create_chapter')
                    <a wire:navigate href="{{ route('admin.books.chapters.create', $book) }}"
                        class="px-3 py-2 font-bold text-indigo-700 border-2 rounded-full">Add
                        Chapter
                    </a>
                @endcan
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
                            @can('create_page')
                                <a wire:navigate
                                    href="{{ route('admin.books.chapters.pages.create', [
                                        'book' => $book,
                                        'chapter' => $chapter,
                                    ]) }}"
                                    class="px-3 py-2 font-bold text-indigo-700 border-2 rounded-full">Add
                                    page
                                </a>
                            @endcan
                            @can('edit_chapter')
                                <a wire:navigate
                                    href="{{ route('admin.books.chapters.edit', [
                                        'book' => $book,
                                        'chapter' => $chapter,
                                    ]) }}"
                                    class="px-3 py-2 font-bold text-indigo-700 border-2 rounded-full">Edit Chapter
                                </a>
                            @endcan
                            @can('delete_chapter')
                                <form
                                    action="{{ route('admin.books.chapters.destroy', [
                                        'book' => $book,
                                        'chapter' => $chapter,
                                    ]) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-3 py-2 font-bold text-red-700 border-2 rounded-full">
                                        Delete
                                    </button>
                                </form>
                            @endcan
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
                                    </a>
                                    @can('edit_page')
                                        <a wire:navigate
                                            href="{{ route('admin.books.chapters.pages.edit', [
                                                'book' => $book,
                                                'chapter' => $chapter,
                                                'page' => $page,
                                            ]) }}"
                                            class="px-3 py-2 font-bold text-indigo-700 border-2 rounded-full">Edit Page
                                        </a>
                                    @endcan
                                    @can('delete_chapter')
                                        <form
                                            action="{{ route('admin.books.chapters.pages.destroy', [
                                                'book' => $book,
                                                'chapter' => $chapter,
                                                'page' => $page,
                                            ]) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="px-3 py-2 font-bold text-red-700 border-2 rounded-full">
                                                Delete
                                            </button>
                                        </form>
                                    @endcan
                                </span>
                            @empty
                                <span class="flex items-center gap-x-5">
                                    <li class="text-gray-500">No pages in this chapter.</li>
                                    @can('create_page')
                                        <a wire:navigate
                                            href="{{ route('admin.books.chapters.pages.create', [
                                                'book' => $book,
                                                'chapter' => $chapter,
                                            ]) }}"
                                            class="px-3 py-2 font-bold text-indigo-700 border-2 rounded-full">Add
                                            page
                                        </a>
                                    @endcan
                                </span>
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
