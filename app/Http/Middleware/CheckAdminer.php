<?php

namespace App\Http\Middleware;

use Closure;

class CheckAdminer
{
    /**
     * 检查管理员是否登录
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ( $request->session()->has('adminid') ) {
          return $next($request);
        } else {
          return redirect()->route('admin.create')->withErrors('请用管理员账号登录！')
        }
    }
}