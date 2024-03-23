<?php

namespace App\Http\Middleware;

use App\Models\Order;
use Closure;
use Illuminate\Support\Facades\Auth;
use App\Models\Video;

class MoviePaid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $href = $request->v;
        $video = Video::where('href', $href)->first();
        if($video->price > 0){
            if(!Auth::check()){
                return redirect()->route('login')->with([
                    'loginBeforeWatch' => true
                ]);
            }else{
                $user = $request->user();
                $order = Order::where('userId', $user->id)
                              ->where('videoId', $video->id)
                              ->where('vnp_ResponseCode', '00')
                              ->first();
                if(!$order){
                    return redirect()->route('video.details', ['v' => $href])->with([
                        'payBeforeWatch' => true
                    ]);
                }
            }
        }
        return $next($request);
    }
}
