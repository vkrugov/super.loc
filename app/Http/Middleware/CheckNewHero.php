<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Validator;

class CheckNewHero
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
        $validator = Validator::make($request->all(), [
            'nickname' => 'required|max:255',
            'real_name' => 'required|max:255',
            'catch_phrase' => 'required',
            'origin_description' => 'required',
            'avatar' => 'image|size:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'error' => $validator->errors()->first()
            ]);
        }

        return $next($request);
    }
}
