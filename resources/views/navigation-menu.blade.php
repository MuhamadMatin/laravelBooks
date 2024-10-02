<nav class="flex items-center justify-between w-full px-6 py-3">
    <div id="nav-left" class="flex items-center">
        <a wire:navigate href="{{ route('index') }}">
            <x-application-mark />
        </a>
        <div class="hidden ml-10 md:block top-menu">
            <span class="flex space-x-5">
                <x-nav-link href="{{ route('index') }}" :active="request()->routeIs('index')">
                    {{ __('Home') }}
                </x-nav-link>
                <x-nav-link href="{{ route('books.index') }}" :active="request()->routeIs('books.index')">
                    {{ __('Books') }}
                </x-nav-link>
                <x-nav-link href="{{ route('admin.categories.index') }}" :active="request()->routeIs('admin.categories.index')">
                    {{ __('Manage Category') }}
                </x-nav-link>
                <x-nav-link href="{{ route('admin.books.index') }}" :active="request()->routeIs('admin.books.index')">
                    {{ __('Manage Books') }}
                </x-nav-link>
                <x-nav-link href="{{ route('admin.users.index') }}" :active="request()->routeIs('admin.users.index')">
                    {{ __('Manage Users') }}
                </x-nav-link>
            </span>
        </div>
        <div class="block pt-2 pb-3 space-x-5 space-y-1 md:hidden">
            <div class="relative ms-3">
                <x-dropdown align="left" width="48">
                    <x-slot name="trigger">
                        Menu
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link href="{{ route('index') }}" :active="request()->routeIs('index')">
                            {{ __('Home') }}
                        </x-dropdown-link>
                        <hr class="border-t border-gray-200">
                        <x-dropdown-link href="{{ route('books.index') }}" :active="request()->routeIs('books.index')">
                            {{ __('Books') }}
                        </x-dropdown-link>
                        <hr class="border-t border-gray-200">
                        <x-dropdown-link href="{{ route('admin.categories.create') }}" :active="request()->routeIs('admin.categories.index')">
                            {{ __('Category') }}
                        </x-dropdown-link>
                        <hr class="border-t border-gray-200">
                        <x-dropdown-link href="{{ route('admin.users.index') }}" :active="request()->routeIs('admin.users.index')">
                            {{ __('Users') }}
                        </x-dropdown-link>
                    </x-slot>
                </x-dropdown>
            </div>
        </div>
    </div>
    <div id="nav-right" class="flex items-center md:space-x-6">
        @auth
            @include('layouts.partials.header_auth')
        @else
            @include('layouts.partials.header_guest')
        @endauth
    </div>
</nav>

{{-- <nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex items-center shrink-0">
                    <a href="{{ route('dashboard') }}">
                        <x-application-mark class="block w-auto h-9" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    <x-nav-link href="{{ route('admin.books.index') }}" :active="request()->routeIs('admin.books.index')">
                        {{ __('Books') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="flex items-center -me-2 sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 text-gray-400 transition duration-150 ease-in-out rounded-md hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500">
                    <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link href="{{ route('admin.books.index') }}" :active="request()->routeIs('admin.books.index')">
                {{ __('Books') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="flex items-center px-4">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <div class="shrink-0 me-3">
                        <img class="object-cover w-10 h-10 rounded-full" src="{{ Auth::user()->profile_photo_url }}"
                            alt="{{ Auth::user()->name }}" />
                    </div>
                @endif

                <div>
                    <div class="text-base font-medium text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="text-sm font-medium text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <!-- Account Management -->
            <div class="mt-3 space-y-1">
                <x-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                    <x-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                        {{ __('API Tokens') }}
                    </x-responsive-nav-link>
                @endif

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf

                    <x-responsive-nav-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav> --}}
