<x-app-layout>
    <main class="container p-6 mx-auto">
        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('admin.users.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-2 gap-5">
                <div>
                    <x-label for="name" :value="__('Name')" />
                    <x-input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name')"
                        required autofocus autocomplete="name" />
                    {{-- <x-input-error :messages="$errors->get('name')" class="mt-2" /> --}}
                </div>
                <div>
                    <x-label for="email" :value="__('email')" />
                    <x-input id="email" class="block w-full mt-1" type="text" name="email" :value="old('email')"
                        required autofocus autocomplete="email" />
                    {{-- <x-input-error :messages="$errors->get('name')" class="mt-2" /> --}}
                </div>
                <div>
                    <x-label for="password" :value="__('password')" />
                    <x-input id="password" class="block w-full mt-1" type="text" name="password" :value="old('password')"
                        required autofocus autocomplete="password" />
                    {{-- <x-input-error :messages="$errors->get('name')" class="mt-2" /> --}}
                </div>
                <div>
                    <x-label for="photo" :value="__('photo')" />
                    <x-input id="profile_photo_path" class="block w-full mt-1" type="file" name="profile_photo_path"
                        :value="old('profile_photo_path')" autofocus autocomplete="profile_photo_path" />
                    {{-- <x-input-error :messages="$errors->get('name')" class="mt-2" /> --}}
                </div>
            </div>

            <div class="flex items-center justify-end mt-4 gap-x-5">
                <a wire:navigate href="{{ route('admin.users.index') }}"
                    class="px-4 py-3 font-bold text-yellow-500 border-2 rounded-full">
                    Back
                </a>
                <button type="submit" class="px-4 py-3 font-bold text-indigo-700 border-2 rounded-full">
                    Add New User
                </button>
            </div>
        </form>
    </main>
</x-app-layout>
