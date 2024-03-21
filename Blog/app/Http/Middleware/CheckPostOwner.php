<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class CheckPostOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $post = Post::find($request->id);
        if($post && $post->user_id == Auth::id()){
            return $next($request);
        }
        abort(403,"You are not uathorized to do this process");
    }
}
