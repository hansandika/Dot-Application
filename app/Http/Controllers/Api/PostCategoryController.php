<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\HandlePostCategoryRequest;
use App\Models\PostCategory;
use Exception;

class PostCategoryController extends Controller
{
    /**
     * Display a listing of the post category
     *
     * @return \Illuminate\Http\Response $categories
     */
    public function index()
    {
        try {
            $categories = PostCategory::get();
            $response = [
                'status' => 200,
                'data' => $categories
            ];
            return response()->json($response, 200);
        } catch (Exception $e) {
            report($e);
            return response()->json(['error' =>  $e->getMessage()], 500);
        }
    }

    /**
     * Store a newly created category in storage.
     *
     * @param  \Illuminate\Http\HandlePostCategoryRequest  $request
     * @return \Illuminate\Http\Response $category
     */
    public function store(HandlePostCategoryRequest $request)
    {
        $attr = $request->all();
        try {
            $category = PostCategory::create($attr);
            $response = [
                'status' => 201,
                'data' => $category,
                'message' => 'Post category added successfully'
            ];
            return response()->json($response, 201);
        } catch (Exception $e) {
            report($e);
            return response()->json(['error' =>  $e->getMessage()], 500);
        }
    }

    /**
     * Update the specified category in storage.
     *
     * @param  \Illuminate\Http\HandlePostCategoryRequest  $request
     * @param  \App\Models\PostCategory  $category
     * @return \Illuminate\Http\Response $category  
     */
    public function update(HandlePostCategoryRequest $request, PostCategory $category)
    {
        $attr = $request->all();
        try {
            $category->update($attr);
            $response = [
                'status' => 201,
                'data' => $category,
                'message' => 'Post category updated successfully'
            ];
            return response()->json($response, 201);
        } catch (Exception $e) {
            report($e);
            return response()->json(['error' =>  $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified category from storage.
     *
     * @param  \App\Models\PostCategory  $category
     * @return \Illuminate\Http\Response $category
     */
    public function destroy(PostCategory $category)
    {
        try {
            $category->delete();
            $response = [
                'status' => 201,
                'data' => $category,
                'message' => 'Delete data successfully'
            ];
            return response()->json($response, 201);
        } catch (Exception $e) {
            report($e);
            return response()->json(['error' =>  $e->getMessage()], 500);
        }
    }
}
