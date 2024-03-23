<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Video;
use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VideoAPI extends Controller
{
    public function commentList(Request $request){
        $href = $request->v;
        $video = Video::where('href', $href)->first();
        $comments = Comment::join('users', 'comments.userId', '=', 'users.id')
                    ->select('comments.*', 'users.fullname')
                    ->where('comments.videoId', $video->id)
                    ->orderBy('comments.createdAt', 'desc')
                    ->paginate(3);
        return $comments;
    }
    public function like(Request $request){
        $href = $request->v;
        $video = Video::where('href', $href)
                        ->first();
        $user = $request->user();
        $history = History::where('videoId', $video->id)
                        ->where('userId', $user->id)
                        ->first();
        $likedAt = null;
        if(!$history->isLiked){
            $likedAt = now(config('constants.DEFAULT_ZONE'));
        }
        $history->isLiked = !$history->isLiked;
        $history->likedAt = $likedAt;
        $history->save();
        return $history;
    }
}
