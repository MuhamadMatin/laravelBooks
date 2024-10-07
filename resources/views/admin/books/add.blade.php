<x-app-layout>
    <main class="container p-6 mx-auto">
        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('admin.books.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-2 gap-5 p-5 border-2 rounded-lg shadow-md">
                <div>
                    <x-label for="name" :value="__('Name')" />
                    <x-input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name')"
                        required autofocus autocomplete="name" />
                    {{-- <x-input-error :messages="$errors->get('name')" class="mt-2" /> --}}
                </div>
                <div>
                    <x-label for="desk" :value="__('Description')" />
                    <x-input id="desk" class="block w-full mt-1" type="text" name="desk" :value="old('desk')"
                        required autofocus autocomplete="desk" />
                    {{-- <x-input-error :messages="$errors->get('name')" class="mt-2" /> --}}
                </div>
                <div>
                    <x-label for="image" :value="__('Image')" />
                    <x-input id="image" class="block w-full mt-1" type="file" name="image" :value="old('image')"
                        autofocus autocomplete="image" />
                    {{-- <x-input-error :messages="$errors->get('name')" class="mt-2" /> --}}
                </div>
                <div>
                    <x-label for="category" :value="__('Category')" />
                    <select id="category" name="category_id" class="block w-full mt-1 rounded-lg">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    {{-- <x-input-error :messages="$errors->get('name')" class="mt-2" /> --}}
                </div>
                <div>
                    <x-label for="show" :value="__('Show')" />
                    <label class="flex items-center mt-1">
                        <input id="show" type="checkbox" name="show" class="toggle-checkbox" value="1"
                            {{ old('show') ? 'checked' : '' }} />
                        <span class="ml-2">Show</span>
                    </label>
                    {{-- <x-input-error :messages="$errors->get('name')" class="mt-2" /> --}}
                </div>
            </div>

            <div class="flex items-center justify-end mt-4 gap-x-5">
                <a wire:navigate href="{{ route('admin.books.index') }}"
                    class="px-3 py-2 font-bold text-orange-300 border-2 rounded-full">Back
                </a>
                <button type="submit" class="px-4 py-3 font-bold text-indigo-700 border-2 rounded-full">
                    Add New Book
                </button>
            </div>
        </form>
    </main>
</x-app-layout>
