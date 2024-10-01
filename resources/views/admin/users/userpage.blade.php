<div class="grid grid-cols-1 gap-10 my-7 md:grid-cols-2">
    @forelse ($users as $user)
        <div class="flex justify-between">
            <div class="flex">
                <img class="w-16 h-16 rounded-full" src="{{ $user->profile_photo_url ?? $user->profile_photo_path }}"
                    alt="{{ $user->name }}">
                <span class="ml-2">
                    <h1>{{ $user->name }}</h1>
                    <h2>{{ $user->email }}</h2>
                </span>
            </div>
            <span class="flex flex-col items-center gap-3">
                <a wire:navigate href="{{ route('admin.users.edit', $user->id) }}"
                    class="px-3 py-2 font-bold text-black border-2 rounded-full">
                    Edit
                </a>
                <form action="{{ route('admin.users.destroy', $user) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-3 py-2 font-bold text-red-700 border-2 rounded-full">
                        Delete
                    </button>
                </form>
        </div>
    @empty
        <p>User empty</p>
    @endforelse
</div>
