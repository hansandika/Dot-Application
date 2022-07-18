<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\HandlePostRequest;
use App\Models\Post;
use App\Models\PostCategory;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display list of post.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response $posts 
     */
    public function index(Request $request)
    {
        $posts = null;
        try {

            if ($request->title && !$request->category) {
                $posts = Post::where('title', 'LIKE', '%' . $request->title . '%');
            }

            if ($request->category && !$request->title) {
                $category = PostCategory::where('name', $request->category)->first();
                $posts = Post::where("post_category_id", $category->id);
            }

            if ($request->title && $request->category) {
                $category = PostCategory::where('name', $request->category)->first();
                $posts = Post::where('title', 'LIKE', '%' . $request->title . '%')->where("post_category_id", $category->id);
            }

            if (!$request->title && !$request->category) {
                $posts = new Post();
            }

            $posts = $posts->with('category')->get();
            $response = [
                'status' => 200,
                'data' => $posts
            ];
            return response()->json($response, 200);
        } catch (Exception $e) {
            report($e);
            return response()->json(['error' =>  $e->getMessage()], 500);
        }
    }

    /**
     * Store a newly post.
     *
     * @param  \App\Http\Requests\HandlePostRequest  $request
     * @return \Illuminate\Http\Response $post
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

        try {
            $post = Post::create($attr);
            $response = [
                'status' => 201,
                'data' => $post->load(['category']),
                'message' => 'Post added successfully'
            ];
            return response()->json($response, 201);
        } catch (Exception $e) {
            report($e);
            return response()->json(['error' =>  $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified post.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response $post
     */
    public function show(Post $post)
    {
        $response = [
            'status' => 200,
            'data' => $post->load(['category'])
        ];
        return response()->json($response, 200);
    }

    /**
     * Update the specified post
     *
     * @param  \Illuminate\Http\HandlePostRequest $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response $post
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

        try {
            $post->update($attr);
            $response = [
                'status' => 201,
                'data' => $post->load(['category']),
                'message' => 'Update post successfully'
            ];
            return response()->json($response, 201);
        } catch (Exception $e) {
            report($e);
            return response()->json(['error' =>  $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified post
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response string
     */
    public function destroy(Post $post)
    {
        $this->authorize('update', $post);

        if ($post->image_url) {
            Storage::disk('public')->delete('posts/' . $post->image_url);
        }
        try {
            $post->delete();
            $response = [
                'status' => 201,
                'data' => $post,
                'message' => 'Delete data successfully'
            ];
            return response()->json($response, 201);
        } catch (Exception $e) {
            report($e);
            return response()->json(['error' =>  $e->getMessage()], 500);
        }
    }
}
