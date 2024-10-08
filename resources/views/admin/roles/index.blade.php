<x-app-layout>
    <main class="container p-6 mx-auto">
        <span class="flex gap-x-5">
            <a wire:navigate href="{{ route('admin.index') }}"
                class="px-4 py-3 font-bold text-yellow-500 border-2 rounded-full">
                Back
            </a>
            @can('create_role')
                <a wire:navigate href="{{ route('admin.roles.create') }}"
                    class="px-4 py-3 font-bold text-indigo-700 border-2 rounded-full">Add
                    new roles</a>
            @endcan
        </span>
        <div class="grid grid-cols-1 gap-10 my-5 md:grid-cols-2">
            @forelse ($roles as $role)
                <div class="flex justify-between">
                    <h1 class="text-2xl font-semibold">{{ $role->name }}</h1>
                    <span class="flex flex-col items-center gap-3">
                        @can('edit_role')
                            <a wire:navigate href="{{ route('admin.roles.edit', $role->id) }}"
                                class="px-3 py-2 font-bold border-2 rounded-full">
                                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path
                                            d="M21.2799 6.40005L11.7399 15.94C10.7899 16.89 7.96987 17.33 7.33987 16.7C6.70987 16.07 7.13987 13.25 8.08987 12.3L17.6399 2.75002C17.8754 2.49308 18.1605 2.28654 18.4781 2.14284C18.7956 1.99914 19.139 1.92124 19.4875 1.9139C19.8359 1.90657 20.1823 1.96991 20.5056 2.10012C20.8289 2.23033 21.1225 2.42473 21.3686 2.67153C21.6147 2.91833 21.8083 3.21243 21.9376 3.53609C22.0669 3.85976 22.1294 4.20626 22.1211 4.55471C22.1128 4.90316 22.0339 5.24635 21.8894 5.5635C21.7448 5.88065 21.5375 6.16524 21.2799 6.40005V6.40005Z"
                                            stroke="#000000" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                        <path
                                            d="M11 4H6C4.93913 4 3.92178 4.42142 3.17163 5.17157C2.42149 5.92172 2 6.93913 2 8V18C2 19.0609 2.42149 20.0783 3.17163 20.8284C3.92178 21.5786 4.93913 22 6 22H17C19.21 22 20 20.2 20 18V13"
                                            stroke="#000000" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                    </g>
                                </svg>
                            </a>
                            <a wire:navigate href="{{ route('admin.roles.permissions.edit', $role) }}"
                                class="px-3 py-2 font-bold border-2 rounded-full">
                                <svg class="w-5 h-5 stroke-2" viewBox="0 0 48 48" id="Layer_2" data-name="Layer 2"
                                    xmlns="http://www.w3.org/2000/svg" fill="#000000">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <defs>
                                            <style>
                                                .cls-1 {
                                                    fill: none;
                                                    stroke: #000000;
                                                    stroke-linecap: round;
                                                    stroke-linejoin: round;
                                                }
                                            </style>
                                        </defs>
                                        <path class="cls-1"
                                            d="M33.07,19.51,28,23.2,30,29.13a.57.57,0,0,1-.87.63L24,26.15l-5.08,3.7a.56.56,0,0,1-.79-.15.62.62,0,0,1-.08-.48L20,23.3l-5.07-3.7a.55.55,0,0,1,.32-1h6.27l1.95-5.93a.55.55,0,0,1,1.06-.09l1.95,5.92h6.27a.56.56,0,0,1,.55.57A.53.53,0,0,1,33.07,19.51Z">
                                        </path>
                                        <path class="cls-1"
                                            d="M24,4.5s-11.26,2-15.25,2v20a11.16,11.16,0,0,0,.8,4.1,15,15,0,0,0,2,3.61,22,22,0,0,0,2.81,3.07,34.47,34.47,0,0,0,3,2.48,34,34,0,0,0,2.89,1.86c1,.59,1.71,1,2.13,1.19l1,.49a1.44,1.44,0,0,0,1.24,0l1-.49c.42-.2,1.13-.6,2.13-1.19a34,34,0,0,0,2.89-1.86,34.47,34.47,0,0,0,3-2.48,22,22,0,0,0,2.81-3.07,15,15,0,0,0,2-3.61,11.16,11.16,0,0,0,.8-4.1v-20C35.26,6.53,24,4.5,24,4.5Z">
                                        </path>
                                    </g>
                                </svg>
                            </a>
                        @endcan
                        @can('delete_role')
                            <form action="{{ route('admin.roles.destroy', $role) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-3 py-2 font-bold border-2 rounded-full">
                                    <svg class="w-5 h-5 stroke-red-400" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                        </g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M7 4C7 2.34315 8.34315 1 10 1H14C15.6569 1 17 2.34315 17 4V5H21C21.5523 5 22 5.44772 22 6C22 6.55228 21.5523 7 21 7H19.9394L19.1153 20.1871C19.0164 21.7682 17.7053 23 16.1211 23H7.8789C6.29471 23 4.98356 21.7682 4.88474 20.1871L4.06055 7H3C2.44772 7 2 6.55228 2 6C2 5.44772 2.44772 5 3 5H7V4ZM9 5H15V4C15 3.44772 14.5523 3 14 3H10C9.44772 3 9 3.44772 9 4V5ZM6.06445 7L6.88085 20.0624C6.91379 20.5894 7.35084 21 7.8789 21H16.1211C16.6492 21 17.0862 20.5894 17.1191 20.0624L17.9355 7H6.06445Z"
                                                fill="#000000"></path>
                                        </g>
                                    </svg>
                                </button>
                            </form>
                        @endcan
                    </span>
                </div>
            @empty
                <p>Roles empty</p>
            @endforelse
        </div>
    </main>
</x-app-layout>
