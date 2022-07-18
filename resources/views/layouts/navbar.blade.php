<nav class="p-6 bg-white border-gray-200 rounded md:px-12 md:py-6 sm:px-4 dark:bg-gray-800">
    <div class="container flex flex-wrap items-center justify-between mx-auto">
        <div>
            <a href="{{ route('show.home') }}" class="text-3xl font-bold">Challange <span
                    class="text-green-400">dot</span></a>
        </div>
        <div class="flex items-center md:order-2">
            @guest
                <div class="items-center hidden space-x-4 md:flex">
                    <a href="{{ route('show.login') }}"
                        class="px-6 py-2.5 text-sm font-medium border-2 border-blue-600 border-solid text-blue-500 hover:bg-blue-600 hover:text-white transition focus:outline-none focus:ring rounded duration-300">Login</a>
                    <a href="{{ route('show.register') }}"
                        class="px-6 py-2.5 text-sm font-medium bg-blue-600 hover:bg-blue-700 border-2 border-transparent text-white transition focus:outline-none focus:ring focus:ring-blue-200 rounded duration-300">Get
                        Started</a>
                </div>
            @endguest
            @auth
                <button type="button"
                    class="flex mr-3 text-sm rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                    id="user-menu-button" aria-expanded="false" type="button" data-dropdown-toggle="dropdown">
                    <span class="sr-only">Open user menu</span>
                    @if (Auth::user()->profile_image)
                        <img class="object-cover w-8 h-8 rounded-full" src="{{ Auth::user()->image }}" alt="user photo">
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-gray-400" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z"
                                clip-rule="evenodd" />
                        </svg>
                    @endif
                </button>
                <!-- Dropdown menu -->
                <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600"
                    id="dropdown">
                    <div class="px-4 py-3">
                        <span class="block text-sm text-gray-900 dark:text-white">{{ Auth::user()->name }}</span>
                        <span
                            class="block text-sm font-medium text-gray-500 truncate dark:text-gray-400">{{ Auth::user()->email }}</span>
                    </div>
                    <ul class="py-1" aria-labelledby="dropdown">
                        <li>
                            <a href="{{ route('profile.index') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Profile</a>
                        </li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign
                                    out</button>
                            </form>
                        </li>
                    </ul>
                </div>
            @endauth
            @guest
                <button data-collapse-toggle="mobile-menu-2" type="button"
                    class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    aria-controls="mobile-menu-2" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            @endguest
        </div>
        @guest
            <div class="relative items-center justify-between hidden w-full md:flex md:w-auto md:order-1"
                id="mobile-menu-2">
                <ul class="flex flex-col mt-4 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium">
                    <li class="text-base">
                        <a href="{{ route('show.login') }}"
                            class="block px-4 py-2 font-medium md:hidden navigation">Login</a>
                    </li>
                    <li class="text-base">
                        <a href="{{ route('show.register') }}"
                            class="block px-4 py-2 font-medium md:hidden navigation">Register</a>
                    </li>
                </ul>
                <div
                    class="absolute left-0 z-0 hidden h-2 transition-all duration-300 bg-blue-700 rounded-md md:block -bottom-2">
                </div>
            </div>
        @endguest
    </div>
</nav>
