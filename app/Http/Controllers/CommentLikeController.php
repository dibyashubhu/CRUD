<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\CommentLike;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentLikeController extends Controller
{
    //
    public function toggle(Comment $comment ){
      if (!Auth::check()) {
            // User not logged in
            // return redirect('welcome')->with('error', 'You must be logged in to post a comment dfdf.');
            return redirect('/');
        }

        $user= Auth::user();

        $like=CommentLike::where('comment_id',$comment->id)->where('user_id',$user->id)->first();

        if($like){
            $like->delete();
            $liked=false;
        }else{
            CommentLike::create([
                'comment_id'=>$comment->id,
                'user_id'=>$user->id,

            ]);
            $liked=true;
        }
        // if (request()->ajax()) {
        //     return response()->json([
        //         'liked' => $liked,
        //         'likes_count' => $comment->likes()->count(),
        //     ]);
        // }

        return back();
    }
}
