<x-app-layout>
    <main class="container p-6 mx-auto">
        <span class="flex gap-x-5">
            <a wire:navigate href="{{ route('admin.index') }}"
                class="px-4 py-3 font-bold text-yellow-500 border-2 rounded-full">Back
            </a>
            @can('create_category')
                <a wire:navigate href="{{ route('admin.categories.create') }}"
                    class="px-4 py-3 font-bold text-indigo-700 border-2 rounded-full">Add
                    new category
                </a>
            @endcan
        </span>
        <div class="grid grid-cols-1 gap-10 my-5 md:grid-cols-2">
            @forelse ($categories as $category)
                <div class="flex justify-between">
                    <span>
                        <h1 class="font-semibold ">Name: {{ $category->name }}</h1>
                        <h2>Slug: {{ $category->slug }}</h2>
                    </span>
                    <span class="flex flex-col items-center gap-3">
                        @can('edit_category')
                            <a wire:navigate href="{{ route('admin.categories.edit', $category->id) }}"
                                class="px-3 py-2 font-bold border-2 rounded-full">
                                <svg class="w-5 h-5 stroke-indigo-700" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
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
                        @endcan
                        @can('delete_category')
                            <form action="{{ route('admin.categories.destroy', $category) }}" method="POST">
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
                <p>Category empty</p>
            @endforelse
        </div>
        <div class="my-3">
            {{ $categories->links() }}
        </div>
    </main>
</x-app-layout>
