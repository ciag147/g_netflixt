<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\History;
use App\Models\Order;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index() {
        $trendingVideos = Video::where('isActive', true)->orderBy('view', 'desc')->limit(4)->get();
        $videos = Video::where('isActive', true)->orderBy('createdAt', 'desc')->paginate(12);
        return view('web.home')->with([
                'trendingVideos' => $trendingVideos,
                'videos' => $videos
            ]);
    }

    public function videoDetails(Request $request){
        $models = [];
        $href = $request->v;
        $video = Video::where('href', $href)->first();
        $models['video'] = $video;
        $comments = Comment::where('videoId', $video->id)
                            ->orderBy('createdAt', 'desc')
                            ->paginate(3);
        $models['comments'] = $comments;
        if(Auth::check()){
            $user = Auth::user();
            $history = History::where('videoId', $video->id)
                                ->where('userId', $user->id)
                                ->first();
            if($history){
                $history->lastViewedAt = now(config('constants.DEFAULT_ZONE'));
                $history->save();
            }else{
                $history = History::create([
                    'userId' => $user->id,
                    'videoId' => $video->id,
                    'lastViewedAt' => now(config('constants.DEFAULT_ZONE')),
                    'isLiked' => false
                ]);
            }
            $order = Order::where('userId', $user->id)
                ->where('videoId', $video->id)
                ->first();
            if($order){
                $models['order'] = $order;
            }
        }
        $models['flagLikeButton'] = $history->isLiked ?? false;
        return view('web.video-details')->with($models);
    }

    public function videoWatch(Request $request){
        $href = $request->v;
        $video = Video::where('href', $href)->first();
        $comments = Comment::where('videoId', $video->id)
                            ->orderBy('createdAt', 'desc')
                            ->paginate(3);
        return view('web.video-watch')->with([
            'video' => $video,
            'comments' => $comments
        ]);
    }

    public function videoCategory(Request $request){
        $code = $request->code;
        $category = Category::where('code', $code)->first();
        $videos = Video::join('categories', 'videos.categoryId', '=', 'categories.id')
                        ->select('videos.*')
                        ->where('videos.isActive', true)
                        ->where('categories.code', $code)
                        ->orderBy('videos.createdAt', 'desc')
                        ->paginate(12);
        return view('web.video-category')->with([
            'category' => $category,
            'videos' => $videos
        ]);
    }
    public function search(Request $request){
        $videos = Video::join('categories', 'videos.categoryId', '=', 'categories.id')
                        ->select('videos.*')
                        ->where('videos.isActive', true)
                        ->where(DB::raw("UPPER(CONCAT(videos.title, ' ', videos.director, ' ', categories.name))"), 'LIKE', '%' . strtoupper($request->keyword) . '%')
                        ->orderBy('videos.createdAt', 'desc')
                        ->paginate(12);
        return view('web.search')->with(['videos' => $videos]);
    }

    public function videoComment(Request $request){
        $href = $request->href;
        $content = $request->content;
        $video = Video::where('href', $href)->first();
        $user = Auth::user();
        
        Comment::create([
            'videoId' => $video->id,
            'userId' => $user->id,
            'content' => $content,
        ]);
        return redirect()->route('video.watch', ['v' => $href]);
    }
    public function about(){
        return view('web.about');
    }
}
