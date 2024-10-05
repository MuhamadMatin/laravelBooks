<x-app-layout>
    <main class="container max-w-3xl p-5 mx-auto md:p-6">
        {{-- Breadcrumb --}}
        <nav class="mx-5 mb-4 text-sm text-gray-500 md:mx-6" aria-label="Breadcrumb">
            <ol class="flex items-center space-x-1 overflow-hidden overflow-x-auto md:space-x-3 whitespace-nowrap">
                {{-- Home Link --}}
                <li class="flex items-center">
                    <a wire:navigate href="{{ route('admin.roles.index') }}">
                        <svg class="w-4 h-4 transition duration-150 ease-in-out fill-gray-500 hover:fill-gray-700"
                            version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 495.398 495.398"
                            xml:space="preserve">
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
                    <a wire:navigate href="{{ route('admin.roles.index') }}"
                        class="ml-1 text-gray-500 transition duration-150 ease-in-out hover:text-gray-700">
                        {{ $role->name }}
                    </a>
                </li>

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
                    <p class="ml-1 text-gray-500 transition duration-150 ease-in-out hover:text-gray-700">
                        permissions
                    </p>
                </li>
            </ol>
            <h1 class="py-4 text-2xl font-semibold text-gray-800">Role: {{ $role->name }}
            </h1>
        </nav>

        <form action="{{ route('admin.roles.permissions.update', $role->id) }}" method="POST" class="px-5 md:px-6">
            @csrf
            @method('PUT')

            <div class="p-5 border border-gray-200 rounded-lg shadow-lg bg-gray-50">
                <h2 class="mb-4 text-lg font-medium text-gray-700">Permissions</h2>
                <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
                    @foreach ($permissions as $permission)
                        <div class="flex items-center">
                            <input class="w-5 h-5 text-orange-600 rounded form-checkbox" type="checkbox"
                                id="permission_{{ $permission->id }}" name="permissions[]"
                                value="{{ $permission->name }}" @if ($role->hasPermissionTo($permission->name)) checked @endif>
                            <label for="permission_{{ $permission->id }}" class="ml-2 text-sm text-gray-700">
                                {{ $permission->name }}
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="flex items-center justify-end mt-4 gap-x-5">
                <a wire:navigate href="{{ route('admin.roles.index') }}"
                    class="px-3 py-2 font-bold text-orange-300 border-2 rounded-full">Back
                </a>
                <button type="submit" class="px-4 py-3 font-bold text-indigo-700 border-2 rounded-full">
                    Edit Role
                </button>
            </div>
        </form>
    </main>
</x-app-layout>
