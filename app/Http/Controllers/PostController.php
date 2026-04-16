<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        return response()->json(Post::all(), 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $post = Post::create($data);

        return response()->json([
            'message' => 'Post created successfully',
            'post' => $post,
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);

        if (!$post) {
            return response()->json([
                'message' => 'Post not found',
            ], 404);
        }

        $data = $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $post->update($data);

        return response()->json([
            'message' => 'Post updated successfully',
            'post' => $post,
        ], 200);
    }

    public function destroy($id)
    {
        $post = Post::find($id);

        if (!$post) {
            return response()->json([
                'message' => 'Post not found',
            ], 404);
        }

        $post->delete();

        return response()->json([
            'message' => 'Post deleted successfully',
        ], 200);
    }
}