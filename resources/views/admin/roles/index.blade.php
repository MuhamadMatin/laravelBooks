<x-app-layout>
    <main class="container p-6 mx-auto">
        @can('create_role')
            <a wire:navigate href="{{ route('admin.roles.create') }}"
                class="px-4 py-3 font-bold text-indigo-700 border-2 rounded-full">Add
                new roles</a>
        @endcan
        <div class="grid grid-cols-1 gap-10 my-5 md:grid-cols-2">
            @forelse ($roles as $role)
                <div class="flex justify-between">
                    <h1 class="text-2xl font-semibold">{{ $role->name }}</h1>
                    <span class="flex flex-col items-center gap-3">
                        @can('edit_role')
                            <a wire:navigate href="{{ route('admin.roles.edit', $role->id) }}"
                                class="px-3 py-2 font-bold text-black border-2 rounded-full">
                                Edit role
                            </a>
                            <a wire:navigate href="{{ route('admin.roles.permissions.edit', $role) }}"
                                class="px-3 py-2 font-bold text-black border-2 rounded-full">
                                Permission
                            </a>
                        @endcan
                        @can('delete_role')
                            <form action="{{ route('admin.roles.destroy', $role) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-3 py-2 font-bold text-red-700 border-2 rounded-full">
                                    Delete
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
