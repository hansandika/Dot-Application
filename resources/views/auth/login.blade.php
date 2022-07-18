<x-app-layout title='Login'>
    <div class="flex items-center justify-center min-h-full px-4 py-12 sm:px-6 lg:px-8">
        <div class="w-full max-w-md px-8 py-8 space-y-8 bg-white rounded-md shadow">
            <div>
                <h2 class="mt-6 text-3xl font-extrabold text-gray-900">Login</h2>
            </div>
            <form class="mt-8 space-y-6" action="{{ route('login') }}" method="POST">
                @csrf
                <div class="space-y-4 rounded-md shadow-sm">
                    <div class="space-y-2">
                        <label for="email-address">Email address <span class="text-red-500">*</span></label>
                        <input id="email-address" name="email" type="email" autocomplete="email" required
                            class="relative block w-full px-3 py-2 text-gray-900 placeholder-gray-500 border border-gray-300 rounded-none appearance-none rounded-t-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm"
                            placeholder="example@mail.com">
                    </div>
                    <div class="space-y-2">
                        <label for="password">Password <span class="text-red-500">*</span></label>
                        <input id="password" name="password" type="password" autocomplete="current-password" required
                            class="relative block w-full px-3 py-2 text-gray-900 placeholder-gray-500 border border-gray-300 rounded-none appearance-none rounded-b-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm"
                            placeholder="Enter your Password">
                    </div>
                </div>
                <div class="flex items-center">
                    <input id="remember-me" name="remember" type="checkbox"
                        class="w-4 h-4 border-gray-300 rounded accent-blue-600 focus:ring-blue-500">
                    <label for="remember-me" class="block ml-2 text-sm text-gray-900 select-none"> Remember me
                    </label>
                </div>
                <div>
                    <button type="submit"
                        class="relative flex items-center justify-center w-full px-6 py-3 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md shadow group hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 ">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                            <!-- Heroicon name: solid/lock-closed -->
                            <svg class="w-5 h-5 text-blue-500 group-hover:text-blue-400"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </span>
                        Sign in
                    </button>
            </form>
            <div class="my-5 w-full h-0.5 bg-black-300 bg-opacity-25"></div>
            <p class="text-sm font-medium text-center">Don’t have an account? <a href="{{ route('show.register') }}"
                    class="text-blue-600 hover:underline">Sign
                    up</a></p>

        </div>
    </div>
</x-app-layout>
