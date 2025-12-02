<?php

namespace App\Http\Controllers;


use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    //
    public function store(Request $request, Blog $blog)
    {
        
        if (!Auth::check()) {
            // User not logged in
            // return redirect('welcome')->with('error', 'You must be logged in to post a comment dfdf.');
            return redirect('/');
        }
        $request->validate([
            'comment' => 'required|string',
        ]);

        Comment::create([
            'blog_id' => $blog->id,
            'user_id' => Auth::id(),
            'comment' => $request->comment,
        ]);

        return redirect()->back()->with('success', 'Comment posted successfully!');
        
    }
}
