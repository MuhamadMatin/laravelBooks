<x-app-layout>
    <main class="container p-6 mx-auto">
        <a wire:navigate href="{{ route('admin.categories.create') }}"
            class="px-4 py-3 font-bold text-indigo-700 border-2 rounded-full">Add
            new category</a>
        <div class="grid grid-cols-1 gap-10 my-5 md:grid-cols-2">
            @forelse ($categories as $category)
                <div class="flex justify-between">
                    <span>
                        <h1 class="font-semibold ">Name: {{ $category->name }}</h1>
                        <h2>Slug: {{ $category->slug }}</h2>
                    </span>
                    <span class="flex flex-col items-center gap-3">
                        <a wire:navigate href="{{ route('admin.categories.edit', $category->id) }}"
                            class="px-3 py-2 font-bold text-black border-2 rounded-full">
                            Edit
                        </a>
                        <form action="{{ route('admin.categories.destroy', $category) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-3 py-2 font-bold text-red-700 border-2 rounded-full">
                                Delete
                            </button>
                        </form>
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
