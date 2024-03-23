<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Video;
use Illuminate\Http\Request;

class CommentAPI extends Controller
{
    public function list(Request $request){
        $href = $request->v;
        $video = Video::where('href', $href)->first();
        $comments = Comment::join('users', 'comments.userId', '=', 'users.id')
                    ->select('comments.*', 'users.fullname')
                    ->where('comments.videoId', $video->id)
                    ->orderBy('comments.createdAt', 'desc')
                    ->paginate(3);
        return $comments;
    }
}
