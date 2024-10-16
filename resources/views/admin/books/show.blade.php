<x-app-layout>
    <div class="container p-6 mx-auto">
        <div class="overflow-hidden bg-white border border-gray-200 rounded-lg shadow-md">
            <div class="flex flex-col md:flex-row">
                <div class="md:w-1/3">
                    <img class="object-cover w-full h-full" src="{{ $book->getImage() }}" alt="{{ $book->name }}">
                </div>
                <div class="flex-wrap p-5 md:w-2/3">
                    <h4 class="text-2xl font-semibold tracking-tight text-gray-900">{{ $book->name }}</h4>
                    <span class="flex items-center mt-4 gap-x-5">
                        <livewire:like-book :key="$book->id" :book="$book" />
                        <h5 class="text-gray-800">{{ $book->User->name }}</h5>
                        @can('edit_book')
                            <a wire:navigate href="{{ route('admin.books.edit', $book) }}"
                                class="px-3 py-2 font-bold text-indigo-700 border-2 rounded-full">
                                <svg class="w-5 h-5 stroke-indigo-400" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path
                                            d="M21.2799 6.40005L11.7399 15.94C10.7899 16.89 7.96987 17.33 7.33987 16.7C6.70987 16.07 7.13987 13.25 8.08987 12.3L17.6399 2.75002C17.8754 2.49308 18.1605 2.28654 18.4781 2.14284C18.7956 1.99914 19.139 1.92124 19.4875 1.9139C19.8359 1.90657 20.1823 1.96991 20.5056 2.10012C20.8289 2.23033 21.1225 2.42473 21.3686 2.67153C21.6147 2.91833 21.8083 3.21243 21.9376 3.53609C22.0669 3.85976 22.1294 4.20626 22.1211 4.55471C22.1128 4.90316 22.0339 5.24635 21.8894 5.5635C21.7448 5.88065 21.5375 6.16524 21.2799 6.40005V6.40005Z"
                                            stroke="#000000" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                        <path
                                            d="M11 4H6C4.93913 4 3.92178 4.42142 3.17163 5.17157C2.42149 5.92172 2 6.93913 2 8V18C2 19.0609 2.42149 20.0783 3.17163 20.8284C3.92178 21.5786 4.93913 22 6 22H17C19.21 22 20 20.2 20 18V13"
                                            stroke="#000000" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                    </g>
                                </svg>
                            </a>
                        @endcan
                        @can('delete_book')
                            <form action="{{ route('admin.books.destroy', $book) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-3 py-2 font-bold border-2 rounded-full">
                                    <svg class="w-5 h-5 stroke-red-400" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M7 4C7 2.34315 8.34315 1 10 1H14C15.6569 1 17 2.34315 17 4V5H21C21.5523 5 22 5.44772 22 6C22 6.55228 21.5523 7 21 7H19.9394L19.1153 20.1871C19.0164 21.7682 17.7053 23 16.1211 23H7.8789C6.29471 23 4.98356 21.7682 4.88474 20.1871L4.06055 7H3C2.44772 7 2 6.55228 2 6C2 5.44772 2.44772 5 3 5H7V4ZM9 5H15V4C15 3.44772 14.5523 3 14 3H10C9.44772 3 9 3.44772 9 4V5ZM6.06445 7L6.88085 20.0624C6.91379 20.5894 7.35084 21 7.8789 21H16.1211C16.6492 21 17.0862 20.5894 17.1191 20.0624L17.9355 7H6.06445Z"
                                                fill="#000000"></path>
                                        </g>
                                    </svg>
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
                    class="px-3 py-2 font-bold border-2 rounded-full">
                    <svg class="w-5 h-5 rotate-180" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path
                                d="M14 7.63636L14 4.5C14 4.22386 13.7761 4 13.5 4L4.5 4C4.22386 4 4 4.22386 4 4.5L4 19.5C4 19.7761 4.22386 20 4.5 20L13.5 20C13.7761 20 14 19.7761 14 19.5L14 16.3636"
                                stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M10 12L21 12M21 12L18.0004 8.5M21 12L18 15.5" stroke="#000000" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round"></path>
                        </g>
                    </svg>
                </a>
                @can('create_chapter')
                    <a wire:navigate href="{{ route('admin.books.chapters.create', $book) }}"
                        class="px-3 py-2 font-bold border-2 rounded-full">
                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path
                                    d="M11 8C11 7.44772 11.4477 7 12 7C12.5523 7 13 7.44772 13 8V11H16C16.5523 11 17 11.4477 17 12C17 12.5523 16.5523 13 16 13H13V16C13 16.5523 12.5523 17 12 17C11.4477 17 11 16.5523 11 16V13H8C7.44771 13 7 12.5523 7 12C7 11.4477 7.44772 11 8 11H11V8Z"
                                    fill="#000000"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M23 12C23 18.0751 18.0751 23 12 23C5.92487 23 1 18.0751 1 12C1 5.92487 5.92487 1 12 1C18.0751 1 23 5.92487 23 12ZM3.00683 12C3.00683 16.9668 7.03321 20.9932 12 20.9932C16.9668 20.9932 20.9932 16.9668 20.9932 12C20.9932 7.03321 16.9668 3.00683 12 3.00683C7.03321 3.00683 3.00683 7.03321 3.00683 12Z"
                                    fill="#000000"></path>
                            </g>
                        </svg>
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
                                    class="px-3 py-2 font-bold border-2 rounded-full">
                                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path
                                                d="M11 8C11 7.44772 11.4477 7 12 7C12.5523 7 13 7.44772 13 8V11H16C16.5523 11 17 11.4477 17 12C17 12.5523 16.5523 13 16 13H13V16C13 16.5523 12.5523 17 12 17C11.4477 17 11 16.5523 11 16V13H8C7.44771 13 7 12.5523 7 12C7 11.4477 7.44772 11 8 11H11V8Z"
                                                fill="#000000"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M23 12C23 18.0751 18.0751 23 12 23C5.92487 23 1 18.0751 1 12C1 5.92487 5.92487 1 12 1C18.0751 1 23 5.92487 23 12ZM3.00683 12C3.00683 16.9668 7.03321 20.9932 12 20.9932C16.9668 20.9932 20.9932 16.9668 20.9932 12C20.9932 7.03321 16.9668 3.00683 12 3.00683C7.03321 3.00683 3.00683 7.03321 3.00683 12Z"
                                                fill="#000000"></path>
                                        </g>
                                    </svg>
                                </a>
                            @endcan
                            @can('edit_chapter')
                                <a wire:navigate
                                    href="{{ route('admin.books.chapters.edit', [
                                        'book' => $book,
                                        'chapter' => $chapter,
                                    ]) }}"
                                    class="px-3 py-2 font-bold border-2 rounded-full">
                                    <svg class="w-5 h-5 stroke-indigo-700" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path
                                                d="M21.2799 6.40005L11.7399 15.94C10.7899 16.89 7.96987 17.33 7.33987 16.7C6.70987 16.07 7.13987 13.25 8.08987 12.3L17.6399 2.75002C17.8754 2.49308 18.1605 2.28654 18.4781 2.14284C18.7956 1.99914 19.139 1.92124 19.4875 1.9139C19.8359 1.90657 20.1823 1.96991 20.5056 2.10012C20.8289 2.23033 21.1225 2.42473 21.3686 2.67153C21.6147 2.91833 21.8083 3.21243 21.9376 3.53609C22.0669 3.85976 22.1294 4.20626 22.1211 4.55471C22.1128 4.90316 22.0339 5.24635 21.8894 5.5635C21.7448 5.88065 21.5375 6.16524 21.2799 6.40005V6.40005Z"
                                                stroke="#000000" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
                                            <path
                                                d="M11 4H6C4.93913 4 3.92178 4.42142 3.17163 5.17157C2.42149 5.92172 2 6.93913 2 8V18C2 19.0609 2.42149 20.0783 3.17163 20.8284C3.92178 21.5786 4.93913 22 6 22H17C19.21 22 20 20.2 20 18V13"
                                                stroke="#000000" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
                                        </g>
                                    </svg>
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
                                    <button type="submit" class="px-3 py-2 font-bold border-2 rounded-full">
                                        <svg class="w-5 h-5 stroke-red-400" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                            </g>
                                            <g id="SVGRepo_iconCarrier">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M7 4C7 2.34315 8.34315 1 10 1H14C15.6569 1 17 2.34315 17 4V5H21C21.5523 5 22 5.44772 22 6C22 6.55228 21.5523 7 21 7H19.9394L19.1153 20.1871C19.0164 21.7682 17.7053 23 16.1211 23H7.8789C6.29471 23 4.98356 21.7682 4.88474 20.1871L4.06055 7H3C2.44772 7 2 6.55228 2 6C2 5.44772 2.44772 5 3 5H7V4ZM9 5H15V4C15 3.44772 14.5523 3 14 3H10C9.44772 3 9 3.44772 9 4V5ZM6.06445 7L6.88085 20.0624C6.91379 20.5894 7.35084 21 7.8789 21H16.1211C16.6492 21 17.0862 20.5894 17.1191 20.0624L17.9355 7H6.06445Z"
                                                    fill="#000000"></path>
                                            </g>
                                        </svg>
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
                                            class="px-3 py-2 font-bold border-2 rounded-full">
                                            <svg class="w-5 h-5 stroke-indigo-700" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                    stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <path
                                                        d="M21.2799 6.40005L11.7399 15.94C10.7899 16.89 7.96987 17.33 7.33987 16.7C6.70987 16.07 7.13987 13.25 8.08987 12.3L17.6399 2.75002C17.8754 2.49308 18.1605 2.28654 18.4781 2.14284C18.7956 1.99914 19.139 1.92124 19.4875 1.9139C19.8359 1.90657 20.1823 1.96991 20.5056 2.10012C20.8289 2.23033 21.1225 2.42473 21.3686 2.67153C21.6147 2.91833 21.8083 3.21243 21.9376 3.53609C22.0669 3.85976 22.1294 4.20626 22.1211 4.55471C22.1128 4.90316 22.0339 5.24635 21.8894 5.5635C21.7448 5.88065 21.5375 6.16524 21.2799 6.40005V6.40005Z"
                                                        stroke="#000000" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                    <path
                                                        d="M11 4H6C4.93913 4 3.92178 4.42142 3.17163 5.17157C2.42149 5.92172 2 6.93913 2 8V18C2 19.0609 2.42149 20.0783 3.17163 20.8284C3.92178 21.5786 4.93913 22 6 22H17C19.21 22 20 20.2 20 18V13"
                                                        stroke="#000000" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                </g>
                                            </svg>
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
                                            <button onclick="return confirm('Sure Want Delete?')" type="submit"
                                                class="px-3 py-2 font-bold border-2 rounded-full">
                                                <svg class="w-5 h-5 stroke-red-400" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                        stroke-linejoin="round"></g>
                                                    <g id="SVGRepo_iconCarrier">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M7 4C7 2.34315 8.34315 1 10 1H14C15.6569 1 17 2.34315 17 4V5H21C21.5523 5 22 5.44772 22 6C22 6.55228 21.5523 7 21 7H19.9394L19.1153 20.1871C19.0164 21.7682 17.7053 23 16.1211 23H7.8789C6.29471 23 4.98356 21.7682 4.88474 20.1871L4.06055 7H3C2.44772 7 2 6.55228 2 6C2 5.44772 2.44772 5 3 5H7V4ZM9 5H15V4C15 3.44772 14.5523 3 14 3H10C9.44772 3 9 3.44772 9 4V5ZM6.06445 7L6.88085 20.0624C6.91379 20.5894 7.35084 21 7.8789 21H16.1211C16.6492 21 17.0862 20.5894 17.1191 20.0624L17.9355 7H6.06445Z"
                                                            fill="#000000"></path>
                                                    </g>
                                                </svg>
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
