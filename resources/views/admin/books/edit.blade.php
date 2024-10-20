<x-app-layout>
    <main class="container p-6 mx-auto">
        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('manage.books.update', $book) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="grid gap-5 p-5 border-2 rounded-lg shadow-md md:grid-cols-2">
                <div>
                    <x-label for="name" :value="__('Name')" />
                    <x-input id="name" class="block w-full mt-1" type="text" name="name"
                        value="{{ $book->name }}" required autofocus autocomplete="name" />
                    {{-- <x-input-error :messages="$errors->get('name')" class="mt-2" /> --}}
                </div>
                <div>
                    <x-label for="desk" :value="__('Description')" />
                    <x-input id="desk" class="block w-full mt-1" type="text" name="desk"
                        value="{{ $book->desk }}" required autofocus autocomplete="desk" />
                    {{-- <x-input-error :messages="$errors->get('name')" class="mt-2" /> --}}
                </div>
                <div>
                    <x-label for="slug" :value="__('Slug')" />
                    <x-input id="slug" class="block w-full mt-1" type="text" name="slug"
                        value="{{ $book->slug }}" required autofocus autocomplete="slug" />
                    {{-- <x-input-error :messages="$errors->get('name')" class="mt-2" /> --}}
                </div>
                <div>
                    <x-label for="image" :value="__('Image')" />
                    <img class="rounded-lg h-80" src="{{ Storage::url($book->image) ?? $book->image }}" alt="">
                    <x-input id="image" class="block w-full mt-1" type="file" name="image" :value="old('image')"
                        autofocus autocomplete="image" />
                    {{-- <x-input-error :messages="$errors->get('name')" class="mt-2" /> --}}
                </div>
                <div>
                    <x-label for="category" :value="__('Category')" />
                    <select id="category" name="category_id" class="block w-full mt-1 rounded-lg">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ $book->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    {{-- <x-input-error :messages="$errors->get('name')" class="mt-2" /> --}}
                </div>
                <div>
                    <x-label for="show" :value="__('Show')" />
                    <label class="flex items-center mt-1">
                        <input class="w-5 h-5 text-orange-600 rounded form-checkbox" id="show" type="checkbox"
                            name="show" class="toggle-checkbox" value="1" {{ $book->show ? 'checked' : '' }} />
                        <label for="show" class="ml-2 text-sm text-gray-700">Show</label>
                    </label>
                    {{-- <x-input-error :messages="$errors->get('name')" class="mt-2" /> --}}
                </div>
            </div>

            <div class="flex items-center justify-end mt-4 gap-x-5">
                <a wire:navigate href="{{ route('manage.books.show', $book) }}"
                    class="px-3 py-2 font-bold text-orange-300 border-2 rounded-full">Back
                </a>
                <button type="submit" class="px-4 py-3 font-bold text-indigo-700 border-2 rounded-full">
                    Edit Book
                </button>
            </div>
        </form>
    </main>
</x-app-layout>
