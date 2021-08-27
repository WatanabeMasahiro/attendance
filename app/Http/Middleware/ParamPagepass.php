<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ParamPagepass
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->has('pagepass2')) {
            $pagepass2 = array('pagepass2' => encrypt($request->pagepass2));
            $request->merge($pagepass2);
        }
        return $next($request);

        // $response = $next($request);
        // レスポンス返却前に実行したいコードを記述する
        // return $response;
    }
    // public function terminate($request, $response)
    // {
    //      レスポンス返却後に実行したいコードを記述する
    // }
}
