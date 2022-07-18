<x-app-layout title='Profile'>
    <div class="w-full h-36 md:h-52">
        <img src="https://picsum.photos/1920" class="object-cover w-full h-full">
    </div>
    <div class="mx-auto x-6 md:px-16">
        <div class="relative pt-4">
            <div class="flex gap-4">
                <div id="image-profile" class="-mt-24 bg-white border-2 rounded-full white border1">
                    @if (Auth::user()->profile_image)
                        <div data-modal-toggle="defaultModal" class="cursor-pointer">
                            <img class="block object-cover rounded-full w-36 h-36 md:w-64 md:h-64"
                                src="{{ $user->image }}" alt="">
                        </div>
                        <div id="defaultModal" tabindex="-1" aria-hidden="true"
                            class="fixed top-0 left-0 right-0 z-50 hidden w-full overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                            <!-- Modal content -->
                            <div class="relative block max-w-2xl mx-auto bg-white rounded-lg shadow dark:bg-gray-700">
                                <img src="{{ Auth::user()->image }}" class="object-cover w-auto h-screen"
                                    alt="">
                                <button type="button"
                                    class="absolute right-0 top-0 text-gray-400 bg-gray-100 hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-toggle="defaultModal">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-40 h-40 md:w-64 md:h-64 text-black-500"
                            viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z"
                                clip-rule="evenodd" />
                        </svg>
                    @endif
                </div>
                <div class="space-y-2">
                    <h2 class="text-2xl font-bold">{{ $user->name }}
                    </h2>
                    <a href="mailto: {{ $user->email }}"
                        class="text-sm text-blue-500 hover:underline hover:text-blue-700">{{ '@' . $user->email }}</a>
                </div>
            </div>
            <form action="{{ route('profile.update', $user) }}" class="pb-8"method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('patch')
                <button type="submit"
                    class="hidden md:block absolute right-0 top-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"><i
                        class="fas fa-save"></i> Save
                    Changes</button>
                <div class="container max-w-sm px-4 py-8 mx-auto space-y-6 md:px-0 md:pt-12 md:max-w-lg">
                    <div>
                        <label for="email-address-icon"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Your Email</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z">
                                    </path>
                                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                                </svg>
                            </div>
                            <input type="text" id="email-address-icon" disabled
                                class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="name@flowbite.com" value="{{ $user->email }}">
                        </div>
                    </div>
                    @if (!$user->provider)
                        <div>
                            <label for="password"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Your
                                password</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="w-5 h-5 text-gray-500 dark:text-gray-400" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M18 8a6 6 0 01-7.743 5.743L10 14l-1 1-1 1H6v2H2v-4l4.257-4.257A6 6 0 1118 8zm-6-4a1 1 0 100 2 2 2 0 012 2 1 1 0 102 0 4 4 0 00-4-4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input type="password" id="password" name="password"
                                    class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    value="{{ old('password') }}" required>
                            </div>
                            @error('password')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                        class="font-medium">Oops!</span>{{ $message }}</p>
                            @enderror
                        </div>
                    @endif
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
                                placeholder="DD/MM/YYYY" value="{{ old('dob', $user->dob->format('Y-m-d')) }}">
                        </div>
                        @error('dob')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                    class="font-medium">Oops!</span>{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                            for="file_input">Upload file</label>
                        <input name="image"
                            class="block w-full text-sm text-gray-900 bg-white border border-gray-300 rounded-lg cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            aria-describedby="file_input_help" id="file_input" type="file">
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">PNG, JPEG, JPG
                            or
                            GIF
                        </p>
                        @error('image')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                    class="font-medium">Oops!</span>{{ $message }}
                            </p>
                        @enderror
                    </div>
                    <button type="submit"
                        class="md:hidden block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"><i
                            class="fas fa-save"></i> Save
                        Changes</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
