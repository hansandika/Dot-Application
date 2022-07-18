<x-app-layout title="Create Post">
    <div class="px-6 mx-auto md:px-16">
        <div class="container py-8">
            <h2 class="text-3xl font-semibold">Create Post</h2>
            <form action="{{ route('posts.store') }}" method="POST" class="max-w-3xl space-y-6"
                enctype="multipart/form-data">
                @csrf
                <x-post-form action='Create' :categories="$categories" />
            </form>
        </div>
    </div>
</x-app-layout>
