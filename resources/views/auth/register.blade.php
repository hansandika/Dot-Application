<x-app-layout title='Register'>
    <div class="flex items-center justify-center min-h-full px-4 py-12 sm:px-6 lg:px-8">
        <div class="w-full max-w-lg px-8 py-8 space-y-8 bg-white rounded-md shadow">
            <div class="space-y-2">
                <h2 class="mt-6 text-3xl font-extrabold text-gray-900">Register</h2>
                <p class="font-medium text-black-300">Become a member</p>
                <div class="w-full h-0.5 bg-black-300"></div>
            </div>
            <form class="space-y-6" action="{{ route('register') }}" method="POST">
                @csrf
                <div class="space-y-2 rounded-md">
                    <div class="space-y-2">
                        <label for="email-address">Email address <span class="text-red-500">*</span></label>
                        <input id="email-address" name="email" type="email" autocomplete="email" required
                            class="relative block w-full px-3 py-2 {{ $errors->first('email') ? 'bg-red-50 border border-red-500 text-red-900 placeholder-red-700' : 'text-gray-900 placeholder-gray-500 border border-gray-300 focus:ring-blue-500 focus:border-blue-500' }}  rounded-none appearance-none rounded-t-md focus:outline-none focus:z-10 sm:text-sm"
                            placeholder="example@mail.com" value="{{ old('email') }}">
                        @error('email')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                    class="font-medium">Oops!</span>{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 space-y-2 sm:col-span-3">
                            <label for="password">Password <span class="text-red-500">*</span></label>
                            <input id="password" name="password" type="password" autocomplete="current-password"
                                required
                                class="relative block w-full px-3 py-2 {{ $errors->first('password') ? 'bg-red-50 border border-red-500 text-red-900 placeholder-red-700' : 'text-gray-900 placeholder-gray-500 border border-gray-300 focus:ring-blue-500 focus:border-blue-500' }} rounded-none appearance-none rounded-b-md focus:outline-none focus:z-10 sm:text-sm"
                                placeholder="at least 7 characters (alphanumeric)" value="{{ old('password') }}">
                            @error('password')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                        class="font-medium">Oops!</span>{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-span-6 space-y-2 sm:col-span-3">
                            <label for="confirm-password">Confirm Password <span class="text-red-500">*</span></label>
                            <input id="confirm-password" name="confirm-password" type="password"
                                autocomplete="confirm-password" required
                                class="relative block w-full px-3 py-2 {{ $errors->first('confirm-password') ? 'bg-red-50 border border-red-500 text-red-900 placeholder-red-700' : 'text-gray-900  placeholder-gray-500 border border-gray-300 focus:ring-blue-500 focus:border-blue-500' }} rounded-none appearance-none rounded-b-md focus:outline-none focus:z-10 sm:text-sm"
                                value="{{ old('confirm-password') }}">
                            @error('confirm-password')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                        class="font-medium">Oops!</span>{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="space-y-2 ">
                        <label for="dob">DOB <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <input type="date" id="dob" name="dob" autocomplete="dob" required
                                class="{{ $errors->first('dob') ? 'bg-red-50 border border-red-500 text-red-900 placeholder-red-700' : 'text-gray-900  placeholder-gray-500 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 ' }} sm:text-sm rounded-lg block w-full pl-10 p-2.5"
                                placeholder="MM / DD / YYYY" value="{{ old('dob') }}">
                        </div>
                        @error('dob')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                    class="font-medium">Oops!</span>{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <div class="flex items-center">
                            <input id="agreement" name="agreement" type="checkbox"
                                class="w-4 h-4 rounded accent-blue-600 focus:ring-blue-500">
                            <label for="agreement" class="block ml-2 text-sm text-gray-900 select-none">Agree with
                                Privacy
                                and Policy
                            </label>
                        </div>
                        @error('agreement')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                    class="font-medium">Oops!</span>{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <button type="submit"
                        class="relative flex justify-center w-full px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md group hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
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
                        Sign up
                    </button>
                </div>
            </form>
            <div class="w-full h-0.5 bg-black-300 bg-opacity-25"></div>
            <p class="text-sm font-medium text-center">Already have an account?<a href="{{ route('show.login') }}"
                    class="text-blue-600 hover:underline">Log in</a></p>
        </div>
    </div>
</x-app-layout>
