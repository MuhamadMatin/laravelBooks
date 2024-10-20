<x-app-layout>
    <main class="container p-6 mx-auto">
        <span class="flex gap-x-5">
            <a wire:navigate href="{{ route('manage.index') }}"
                class="px-4 py-3 font-bold text-yellow-500 border-2 rounded-full">
                Back
            </a>
            @can('create_user')
                <a wire:navigate href="{{ route('manage.users.create') }}"
                    class="px-4 py-3 font-bold text-indigo-700 border-2 rounded-full">Add
                    user</a>
            @endcan
        </span>
        <livewire:user-list />
    </main>
</x-app-layout>
