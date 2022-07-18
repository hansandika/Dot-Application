<x-app-layout title="Edit Discussion">
    <div class="px-6 mx-auto md:px-16">
        <div class="container py-8">
            <h2 class="text-3xl font-semibold">Edit Post</h2>
            <form action="{{ route('posts.update', $post) }}" method="POST" class="max-w-3xl space-y-6"
                enctype="multipart/form-data">
                @csrf
                @method('patch')
                <x-post-form action='Edit' :categories="$categories" :post="$post" />
            </form>
        </div>
    </div>
</x-app-layout>
