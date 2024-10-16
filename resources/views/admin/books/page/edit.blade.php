<x-app-layout>
    <main class="container p-6 mx-auto">
        <x-validation-errors class="mb-4" />

        <form method="POST"
            action="{{ route('admin.books.chapters.pages.update', [
                'book' => $book,
                'chapter' => $chapter,
                'page' => $page,
            ]) }}"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="grid gap-5 p-5 overflow-auto border-2 rounded-lg shadow-md">
                <div>
                    <div>
                        <x-label for="name" :value="__('Name')" />
                        <x-input id="name" class="block w-full mt-1" type="text" name="name"
                            value="{{ $page->name }}" required autofocus autocomplete="name" />
                        {{-- <x-input-error :messages="$errors->get('name')" class="mt-2" /> --}}
                    </div>
                    <div>
                        <x-label for="book" :value="__('Book')" />
                        <select id="book" name="book_id" class="block w-full mt-1 rounded-lg">
                            <option value="{{ $book->id }}">
                                {{ $book->name }}
                            </option>
                        </select>
                        {{-- <x-input-error :messages="$errors->get('name')" class="mt-2" /> --}}
                    </div>
                    <div>
                        <x-label for="chapter" :value="__('Chapter')" />
                        <select id="chapter" name="chapter_id" class="block w-full mt-1 rounded-lg">
                            <option value="{{ $chapter->id }}">
                                {{ $chapter->name }}
                            </option>
                        </select>
                        {{-- <x-input-error :messages="$errors->get('name')" class="mt-2" /> --}}
                    </div>
                </div>
                <div>
                    <x-label for="body" :value="__('body')" />
                    <div class="main-container">
                        <div class="editor-container editor-container_classic-editor" id="editor-container">
                            <div class="editor-container__editor">
                                <textarea wire:ignore id="editor" class="block w-full mt-1" type="textarea" name="body" required autofocus
                                    autocomplete="body" />
                                    {{ $page->body }}
                                </textarea>
                            </div>
                        </div>
                    </div>
                    {{-- <x-input-error :messages="$errors->get('name')" class="mt-2" /> --}}
                </div>
            </div>

            <div class="flex items-center justify-end mt-4 gap-x-5">
                <a wire:navigate href="{{ route('admin.books.show', $page->book_id) }}"
                    class="px-3 py-2 font-bold text-orange-300 border-2 rounded-full">Back
                </a>
                <button type="submit" class="px-4 py-3 font-bold text-indigo-700 border-2 rounded-full">
                    Edit Page
                </button>
            </div>
        </form>
    </main>
</x-app-layout>
