<?php

namespace Inn20\Blog\Middleware;

use Closure;
use Inn20\Blog\Services\AppService;

class ViewShare
{
    /**
     * 处理传入的请求
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        AppService::viewShare();
        return $next($request);
    }
}