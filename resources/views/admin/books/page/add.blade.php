<x-app-layout>
    <main class="container p-6 mx-auto">
        <x-validation-errors class="mb-4" />

        <form method="POST"
            action="{{ route('manage.books.chapters.pages.store', [
                'book' => $book,
                'chapter' => $chapter,
            ]) }}"
            enctype="multipart/form-data">
            @csrf
            <div class="grid gap-5 p-5 overflow-auto border-2 rounded-lg shadow-md">
                <div>
                    <div>
                        <x-label for="name" :value="__('Name')" />
                        <x-input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name')"
                            required autofocus autocomplete="name" />
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
                            <option value="{{ $chapter->id }}">{{ $chapter->name }}</option>
                        </select>
                        {{-- <x-input-error :messages="$errors->get('name')" class="mt-2" /> --}}
                    </div>
                </div>
                <div>
                    <x-label for="body" :value="__('Body')" />
                    <textarea id="editor" class="block w-full mt-1" type="textarea" name="body" :value="old('body')" required
                        autofocus autocomplete="body" />
                    </textarea>
                    {{-- <x-input-error :messages="$errors->get('name')" class="mt-2" /> --}}
                </div>
            </div>

            <div class="flex items-center justify-end mt-4 gap-x-5">
                <a wire:navigate href="{{ route('manage.books.show', $book) }}"
                    class="px-3 py-2 font-bold text-orange-300 border-2 rounded-full">Back
                </a>
                <button type="submit" class="px-4 py-3 font-bold text-indigo-700 border-2 rounded-full">
                    Add Page
                </button>
            </div>
        </form>
    </main>
</x-app-layout>
