<nav class="mb-4 text-sm text-gray-500" aria-label="Breadcrumb">
    <!-- Wrapper untuk breadcrumb dengan overflow-x-auto -->
    <ol class="flex items-center space-x-1 overflow-hidden overflow-x-auto md:space-x-3 whitespace-nowrap no-scrollbar">
        {{-- Home Link --}}
        <li class="flex items-center">
            <a wire:navigate href="{{ route('index') }}">
                <svg class="w-4 h-4 transition duration-150 ease-in-out fill-gray-500 hover:fill-gray-700" version="1.1"
                    id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                    viewBox="0 0 495.398 495.398" xml:space="preserve">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <g>
                            <g>
                                <g>
                                    <path
                                        d="M487.083,225.514l-75.08-75.08V63.704c0-15.682-12.708-28.391-28.413-28.391c-15.669,0-28.377,12.709-28.377,28.391 v29.941L299.31,37.74c-27.639-27.624-75.694-27.575-103.27,0.05L8.312,225.514c-11.082,11.104-11.082,29.071,0,40.158 c11.087,11.101,29.089,11.101,40.172,0l187.71-187.729c6.115-6.083,16.893-6.083,22.976-0.018l187.742,187.747 c5.567,5.551,12.825,8.312,20.081,8.312c7.271,0,14.541-2.764,20.091-8.312C498.17,254.586,498.17,236.619,487.083,225.514z">
                                    </path>
                                    <path
                                        d="M257.561,131.836c-5.454-5.451-14.285-5.451-19.723,0L72.712,296.913c-2.607,2.606-4.085,6.164-4.085,9.877v120.401 c0,28.253,22.908,51.16,51.16,51.16h81.754v-126.61h92.299v126.61h81.755c28.251,0,51.159-22.907,51.159-51.159V306.79 c0-3.713-1.465-7.271-4.085-9.877L257.561,131.836z">
                                    </path>
                                </g>
                            </g>
                        </g>
                    </g>
                </svg>
            </a>
        </li>

        {{-- Book --}}
        @if (request()->routeIs('books.show') || request()->routeIs('chapter.show') || request()->routeIs('page.show'))
            <li class="flex items-center">
                <svg class="w-3 h-3 fill-gray-400" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 330 330" xml:space="preserve">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path id="XMLID_222_"
                            d="M250.606,154.389l-150-149.996c-5.857-5.858-15.355-5.858-21.213,0.001 c-5.857,5.858-5.857,15.355,0.001,21.213l139.393,139.39L79.393,304.394c-5.857,5.858-5.857,15.355,0.001,21.213 C82.322,328.536,86.161,330,90,330s7.678-1.464,10.607-4.394l149.999-150.004c2.814-2.813,4.394-6.628,4.394-10.606 C255,161.018,253.42,157.202,250.606,154.389z">
                        </path>
                    </g>
                </svg>
                <a wire:navigate href="{{ route('books.show', $book->slug ?? $book) }}"
                    class="ml-1 text-gray-500 transition duration-150 ease-in-out hover:text-gray-700">
                    {{ $book->name ?? $book }}
                </a>
            </li>
        @endif

        {{-- Chapter --}}
        @if (request()->routeIs('chapter.show') || request()->routeIs('page.show'))
            <li class="flex items-center">
                <svg class="w-3 h-3 fill-gray-400" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 330 330" xml:space="preserve">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path id="XMLID_222_"
                            d="M250.606,154.389l-150-149.996c-5.857-5.858-15.355-5.858-21.213,0.001 c-5.857,5.858-5.857,15.355,0.001,21.213l139.393,139.39L79.393,304.394c-5.857,5.858-5.857,15.355,0.001,21.213 C82.322,328.536,86.161,330,90,330s7.678-1.464,10.607-4.394l149.999-150.004c2.814-2.813,4.394-6.628,4.394-10.606 C255,161.018,253.42,157.202,250.606,154.389z">
                        </path>
                    </g>
                </svg>
                <a wire:navigate
                    href="{{ route('chapter.show', [
                        'book' => $book->slug ?? $book,
                        'chapter' => $chapter->slug ?? $chapter,
                    ]) }}"
                    class="ml-1 text-gray-500 transition duration-150 ease-in-out hover:text-gray-700">
                    {{ $chapter->name ?? $chapter }}
                </a>
            </li>
        @endif

        {{-- Pages --}}
        @if (request()->routeIs('page.show'))
            <li class="flex items-center">
                <svg class="w-3 h-3 fill-gray-400" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 330 330" xml:space="preserve">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path id="XMLID_222_"
                            d="M250.606,154.389l-150-149.996c-5.857-5.858-15.355-5.858-21.213,0.001 c-5.857,5.858-5.857,15.355,0.001,21.213l139.393,139.39L79.393,304.394c-5.857,5.858-5.857,15.355,0.001,21.213 C82.322,328.536,86.161,330,90,330s7.678-1.464,10.607-4.394l149.999-150.004c2.814-2.813,4.394-6.628,4.394-10.606 C255,161.018,253.42,157.202,250.606,154.389z">
                        </path>
                    </g>
                </svg>
                <a wire:navigate
                    href="{{ route('page.show', [
                        'book' => $book->slug ?? $book,
                        'chapter' => $chapter->slug ?? $chapter,
                        'page' => $page->slug,
                    ]) }}"
                    class="ml-1 text-gray-500 transition duration-150 ease-in-out hover:text-gray-700">
                    {{ $page->name }}
                </a>
            </li>
        @endif
    </ol>
</nav>
