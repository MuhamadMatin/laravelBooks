<div
    class="w-full inline-flex flex-nowrap overflow-hidden [mask-image:_linear-gradient(to_right,transparent_0,_black_128px,_black_calc(100%-200px),transparent_100%)]">
    <ul
        class="flex items-center justify-center md:justify-start [&_li]:mx-4 [&_img]:max-w-none animate-infinite-scroll hover:animation-pause cursor-pointer">
        @forelse ($categories as $category)
            <li class="px-4 py-2 text-center border-2 rounded-full whitespace-nowrap no-scrollbar">
                {{ $category->name }}
            </li>
        @empty
            <p class="px-4 py-2 text-center border-2 rounded-full">Category empty</p>
        @endforelse
    </ul>
</div>
