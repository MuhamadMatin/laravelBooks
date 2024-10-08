<x-app-layout>
    <main class="container py-5 mx-auto">
        <div class="grid grid-cols-1 gap-6 m-6 md:grid-cols-2 lg:grid-cols-4">
            @role('Admin|admin|Editor|editor')
                <!-- Card Manage Books -->
                <div class="flex flex-col items-center p-6 bg-white rounded-lg shadow-lg">
                    <x-nav-link href="{{ route('admin.books.index') }}" :active="request()->routeIs('admin.books.index')" class="text-lg font-semibold">
                        {{ __('Manage Books') }}
                    </x-nav-link>
                    <span class="flex items-center mt-3">
                        <svg class="w-8 h-8 text-blue-500" fill="" height="" width="" version="1.1"
                            id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            viewBox="0 0 487.5 487.5" xml:space="preserve">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <g>
                                    <g>
                                        <path
                                            d="M437,12.3C437,5.5,431.5,0,424.7,0H126.3C84.4,0,50.4,34.1,50.4,75.9v335.7c0,41.9,34.1,75.9,75.9,75.9h298.5 c6.8,0,12.3-5.5,12.3-12.3V139.6c0-6.8-5.5-12.3-12.3-12.3H126.3c-28.3,0-51.4-23.1-51.4-51.4S98,24.5,126.3,24.5h298.5 C431.5,24.5,437,19,437,12.3z M126.3,151.8h286.2V463H126.3c-28.3,0-51.4-23.1-51.4-51.4V131.7 C88.4,144.2,106.5,151.8,126.3,151.8z">
                                        </path>
                                        <path
                                            d="M130.5,64.8c-6.8,0-12.3,5.5-12.3,12.3s5.5,12.3,12.3,12.3h280.1c6.8,0,12.3-5.5,12.3-12.3s-5.5-12.3-12.3-12.3H130.5z">
                                        </path>
                                        <path
                                            d="M178,397.7c6.3,2.4,13.4-0.7,15.8-7.1l17.9-46.8h62.7c0.5,0,0.9-0.1,1.3-0.1l17.9,46.9c1.9,4.9,6.5,7.9,11.4,7.9 c1.5,0,2.9-0.3,4.4-0.8c6.3-2.4,9.5-9.5,7.1-15.8l-54-141.2c-3-7.9-10.4-13-18.8-13c-8.4,0-15.8,5.1-18.8,13l-54,141.2 C168.5,388.2,171.7,395.2,178,397.7z M243.7,260l22.7,59.3h-45.3L243.7,260z">
                                        </path>
                                    </g>
                                </g>
                            </g>
                        </svg>
                        <p class="ml-3 text-3xl font-bold">{{ $books }}</p>
                    </span>
                </div>
            @endrole

            @role('Admin|admin')
                <!-- Card Manage Categories -->
                <div class="flex flex-col items-center p-6 bg-white rounded-lg shadow-lg">
                    <x-nav-link href="{{ route('admin.categories.index') }}" :active="request()->routeIs('admin.categories.index')"
                        class="text-lg font-semibold">
                        {{ __('Manage Category') }}
                    </x-nav-link>
                    <span class="flex items-center mt-3">
                        <svg class="w-8 h-8 text-green-500" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path d="M5 10H7C9 10 10 9 10 7V5C10 3 9 2 7 2H5C3 2 2 3 2 5V7C2 9 3 10 5 10Z"
                                    stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                                <path d="M17 10H19C21 10 22 9 22 7V5C22 3 21 2 19 2H17C15 2 14 3 14 5V7C14 9 15 10 17 10Z"
                                    stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                                <path
                                    d="M17 22H19C21 22 22 21 22 19V17C22 15 21 14 19 14H17C15 14 14 15 14 17V19C14 21 15 22 17 22Z"
                                    stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                                <path d="M5 22H7C9 22 10 21 10 19V17C10 15 9 14 7 14H5C3 14 2 15 2 17V19C2 21 3 22 5 22Z"
                                    stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                            </g>
                        </svg>
                        <p class="ml-3 text-3xl font-bold">{{ $categories }}</p>
                    </span>
                </div>

                <!-- Card Manage Users -->
                <div class="flex flex-col items-center p-6 bg-white rounded-lg shadow-lg">
                    <x-nav-link href="{{ route('admin.users.index') }}" :active="request()->routeIs('admin.users.index')" class="text-lg font-semibold">
                        {{ __('Manage Users') }}
                    </x-nav-link>
                    <span class="flex items-center mt-3">
                        <svg class="w-8 h-8 text-purple-500" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path
                                    d="M16 7C16 9.20914 14.2091 11 12 11C9.79086 11 8 9.20914 8 7C8 4.79086 9.79086 3 12 3C14.2091 3 16 4.79086 16 7Z"
                                    stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M12 14C8.13401 14 5 17.134 5 21H19C19 17.134 15.866 14 12 14Z" stroke="#000000"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            </g>
                        </svg>
                        <p class="ml-3 text-3xl font-bold">{{ $users }}</p>
                    </span>
                </div>

                <!-- Card Manage Roles -->
                <div class="flex flex-col items-center p-6 bg-white rounded-lg shadow-lg">
                    <x-nav-link href="{{ route('admin.roles.index') }}" :active="request()->routeIs('admin.roles.index')" class="text-lg font-semibold">
                        {{ __('Manage Roles') }}
                    </x-nav-link>
                    <span class="flex items-center mt-3">
                        <svg class="w-8 h-8 text-red-500" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path
                                    d="M4 21C4 17.4735 6.60771 14.5561 10 14.0709M19.8726 15.2038C19.8044 15.2079 19.7357 15.21 19.6667 15.21C18.6422 15.21 17.7077 14.7524 17 14C16.2923 14.7524 15.3578 15.2099 14.3333 15.2099C14.2643 15.2099 14.1956 15.2078 14.1274 15.2037C14.0442 15.5853 14 15.9855 14 16.3979C14 18.6121 15.2748 20.4725 17 21C18.7252 20.4725 20 18.6121 20 16.3979C20 15.9855 19.9558 15.5853 19.8726 15.2038ZM15 7C15 9.20914 13.2091 11 11 11C8.79086 11 7 9.20914 7 7C7 4.79086 8.79086 3 11 3C13.2091 3 15 4.79086 15 7Z"
                                    stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                </path>
                            </g>
                        </svg>
                        <p class="ml-3 text-3xl font-bold">{{ $roles }}</p>
                    </span>
                </div>
            @endrole
        </div>
    </main>
</x-app-layout>
