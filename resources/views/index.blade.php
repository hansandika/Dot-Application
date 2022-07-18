<x-app-layout title='Home'>
    <div class="px-6 mx-auto md:px-16">
        <main class="container py-8">
            <div class="flex items-center justify-between pb-2 mb-8 border-b-2 border-black-300">
                <h2 class="text-2xl font-bold">List Post</h2>
                <div class="space-x-2">
                    <a href="{{ route('posts.create') }}" type="button"
                        class="focus:outline-none text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 md:px-5 md:py-2.5 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create
                        Posts</a>
                </div>
            </div>
            <div class="mb-8">
                @foreach ($categories as $category)
                    <a href="{{ route('show.home', ['category' => $category->name]) }}" type="button"
                        class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">{{ $category->name }}</a>
                @endforeach
            </div>
            @forelse ($posts as $post)
                <div class="flex items-center gap-4">
                    <div
                        class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                        @if ($post->image_url)
                            <img class="rounded-t-lg" src="{{ $post->image }}" alt="" />
                        @endif
                        <div class="p-5">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                {{ $post->title }}</h5>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $post->description }}</p>
                            @can('update', $post)
                                <div class="flex items-center">
                                    <a href="{{ route('posts.edit', $post) }}" type="button"
                                        class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Edit</a>
                                    <form action="{{ route('posts.destroy', $post) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit"
                                            class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Delete</button>
                                    </form>
                                </div>
                            @endcan
                        </div>
                    </div>
                @empty
                    <h3 class="text-2xl font-semibold text-red-400">There is no post yet!</h3>
            @endforelse
    </div>
    </main>
    </div>
</x-app-layout>
