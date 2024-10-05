<x-app-layout>
    <main class="container p-6 mx-auto">
        @can('create_user')
            <a wire:navigate href="{{ route('admin.users.create') }}"
                class="px-4 py-3 font-bold text-indigo-700 border-2 rounded-full">Add
                new user</a>
        @endcan
        <livewire:user-list />
    </main>
</x-app-layout>
