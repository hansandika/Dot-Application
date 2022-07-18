<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Return homepage view with posts data
     * @return posts and categories
     */
    public function __invoke(Request $request)
    {
        $posts = null;

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

        $categories = PostCategory::get();
        return view('index', compact('posts', 'categories'));
    }
}
