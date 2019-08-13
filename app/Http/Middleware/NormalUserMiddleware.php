<?php

namespace App\Http\Middleware;

use Closure;

class NormalUserMiddleware
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
        $user_id = session('user_id');

        if(!$user_id){
            echo "<script>alert('请先登录');location.href='/index/login';</script>";
        }
        return $next($request);
    }
}
