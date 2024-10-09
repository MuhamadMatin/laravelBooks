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
                    <span>
                        <div x-data="{ photoName: null, photoPreview: null }" class="col-span-6 sm:col-span-4">
                            <!-- Profile Photo File Input -->
                            <input id="profile_photo_path" class="hidden w-full mt-1" type="file"
                                name="profile_photo_path" value="profile_photo_path" autofocus
                                autocomplete="profile_photo_path" wire:model.live="profile_photo_path"
                                x-ref="profile_photo_path"
                                x-on:change="
                                                photoName = $refs.profile_photo_path.files[0].name;
                                                const reader = new FileReader();
                                                reader.onload = (e) => {
                                                    photoPreview = e.target.result;
                                                };
                                                reader.readAsDataURL($refs.profile_photo_path.files[0]);
                                        " />

                            <x-label for="photo" value="{{ __('Photo') }}" />

                            <!-- Current Profile Photo -->
                            <div class="mt-2" x-show="! photoPreview">
                                <img src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}"
                                    class="object-cover w-20 h-20 rounded-full">
                            </div>

                            <!-- New Profile Photo Preview -->
                            <div class="mt-2" x-show="photoPreview" style="display: none;">
                                <span class="block w-20 h-20 bg-center bg-no-repeat bg-cover rounded-full"
                                    x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                                </span>
                            </div>

                            <button class="px-3 py-2 mt-2 font-bold text-indigo-700 border-2 rounded-full"
                                type="button" x-on:click.prevent="$refs.profile_photo_path.click()">
                                {{ __('Select A New Photo') }}
                            </button>

                            <x-input-error for="photo" class="mt-2" />
                        </div>
                        {{-- <x-label for="photo" :value="__('photo')" />
                        <x-input id="profile_photo_path" class="block w-full mt-1" type="file"
                            name="profile_photo_path" value="profile_photo_path" autofocus
                            autocomplete="profile_photo_path" /> --}}
                        {{-- <x-input-error :messages="$errors->get('name')" class="mt-2" /> --}}
                    </span>
                </div>
            </div>

            <div class="flex items-center justify-end mt-4 gap-x-5">
                <a wire:navigate href="{{ route('admin.users.index') }}"
                    class="px-4 py-3 font-bold text-yellow-500 border-2 rounded-full">
                    Back
                </a>
                <button type="submit" class="px-4 py-3 font-bold text-indigo-700 border-2 rounded-full">
                    Update User
                </button>
            </div>
        </form>
    </main>
</x-app-layout>
