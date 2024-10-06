<x-app-layout>
    <main class="container p-6 mx-auto">
        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('admin.page.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="grid gap-5 md:grid-cols-2">
                <div>
                    <x-label for="name" :value="__('Name')" />
                    <x-input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name')"
                        required autofocus autocomplete="name" />
                    {{-- <x-input-error :messages="$errors->get('name')" class="mt-2" /> --}}
                </div>
                <div>
                    <x-label for="book" :value="__('Book')" />
                    <select id="book" name="book_id" class="block w-full mt-1">
                        @foreach ($books as $book)
                            <option value="{{ $book->id }}">
                                {{ $book->name }}
                            </option>
                        @endforeach
                    </select>
                    {{-- <x-input-error :messages="$errors->get('name')" class="mt-2" /> --}}
                </div>
                <div>
                    <x-label for="chapter" :value="__('Chapter')" />
                    <select id="chapter" name="chapter_id" class="block w-full mt-1">
                        @foreach ($book->chapters as $chapter)
                            <option value="{{ $chapter->id }}">
                                {{ $chapter->name }}
                            </option>
                        @endforeach
                    </select>
                    {{-- <x-input-error :messages="$errors->get('name')" class="mt-2" /> --}}
                </div>
                <div>
                    <x-label for="body" :value="__('Body')" />
                    <x-input id="body" class="block w-full mt-1" type="textarea" name="body" :value="old('body')"
                        required autofocus autocomplete="body" />
                    {{-- <x-input-error :messages="$errors->get('name')" class="mt-2" /> --}}
                </div>
            </div>

            <div class="flex items-center justify-end mt-4 gap-x-5">
                <a wire:navigate href="{{ route('admin.books.index') }}"
                    class="px-3 py-2 font-bold text-orange-300 border-2 rounded-full">Back
                </a>
                <button type="submit" class="px-4 py-3 font-bold text-indigo-700 border-2 rounded-full">
                    Edit Book
                </button>
            </div>
        </form>
    </main>
</x-app-layout>
