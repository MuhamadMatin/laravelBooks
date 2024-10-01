<x-app-layout>
    <main class="container p-6 mx-auto">
        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('admin.users.update', $user->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-2 gap-5">
                <div>
                    <x-label for="name" :value="__('Name')" />
                    <x-input id="name" class="block w-full mt-1" type="text" name="name"
                        value="{{ $user->name }}" required autofocus autocomplete="name" />
                    {{-- <x-input-error :messages="$errors->get('name')" class="mt-2" /> --}}
                </div>
                <div>
                    <x-label for="email" :value="__('email')" />
                    <x-input id="email" class="block w-full mt-1" type="text" name="email"
                        value="{{ $user->email }}" required autofocus autocomplete="email" />
                    {{-- <x-input-error :messages="$errors->get('name')" class="mt-2" /> --}}
                </div>
                <div class="flex flex-grow gap-x-5">
                    @if ($user->profile_photo_path)
                        <img class="w-16 h-16 overflow-hidden bg-cover rounded-full"
                            src="{{ Storage::url($user->profile_photo_path) }}" alt="">
                    @endif
                    <span>
                        <x-label for="photo" :value="__('photo')" />
                        <x-input id="profile_photo_path" class="block w-full mt-1" type="file"
                            name="profile_photo_path" value="profile_photo_path" autofocus
                            autocomplete="profile_photo_path" />
                        {{-- <x-input-error :messages="$errors->get('name')" class="mt-2" /> --}}
                    </span>
                </div>
            </div>

            <div class="flex items-center justify-end mt-4">
                <button type="submit" class="px-4 py-3 font-bold text-indigo-700 border-2 rounded-full">
                    Update User
                </button>
            </div>
        </form>
    </main>
</x-app-layout>
