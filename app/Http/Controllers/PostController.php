<?php

namespace App\Http\Controllers;

use App\Http\Requests\HandlePostRequest;
use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Show the form for creating a post
     *
     * @return categories
     */
    public function create()
    {
        $categories = PostCategory::get();
        return view('posts.create', compact('categories'));
    }

    /**
     * Store a newly created post in storage.
     *
     * @param  \App\Http\Requests\HandlePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HandlePostRequest $request)
    {
        $attr = $request->all();
        $attr['post_category_id'] = $request->category;
        $attr['user_id'] = Auth::id();

        if ($request->file('image')) {
            $file = $request->file('image');
            $fileName = date('YmdHi') . $file->getClientOriginalName();
            $filePath = 'posts';
            Storage::disk('public')->putFileAs($filePath, request('image'), $fileName);
            $attr['image_url'] = $fileName;
        }
        Post::create($attr);
        return redirect('/')->with('success-info', 'Add Post Successfully');
    }

    /**
     * Show the form for editing the specified post.
     *
     * @param  \App\Models\Post  $post
     * @return posts, categories
     */
    public function edit(Post $post)
    {
        $this->authorize('update', $post);
        $categories = PostCategory::get();
        return view('posts.edit', compact('post', 'categories'));
    }

    /**
     * Update specific post
     *
     * @param  \App\Http\Requests\HandlePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(HandlePostRequest $request, Post $post)
    {
        $this->authorize('update', $post);
        $attr = $request->all();
        $attr['post_category_id'] = $request->category;

        if ($request->file('image')) {
            if ($post->image_url) {
                Storage::disk('public')->delete('posts/' . $post->image_url);
            }
            $file = $request->file('image');
            $fileName = date('YmdHi') . $file->getClientOriginalName();
            $filePath = 'posts';
            Storage::disk('public')->putFileAs($filePath, request('image'), $fileName);
            $attr['image_url'] = $fileName;
        }
        $post->update($attr);
        return redirect('/')->with('success-info', 'Update Post Successfully');
    }

    /**
     * Remove specific post
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $this->authorize('update', $post);

        if ($post->image_url) {
            Storage::disk('public')->delete('posts/' . $post->image_url);
        }
        $post->delete();
        return redirect('/')->with('success-info', 'Delete post Successfully');
    }
}
