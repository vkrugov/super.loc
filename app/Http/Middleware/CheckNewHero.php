<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Validator;

class CheckNewHero
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $validator = Validator::make($request->all(), [
            'nickname' => $request->id ? 'required|max:255' : 'required|max:255|unique:hero',
            'real_name' => 'required|max:255',
            'catch_phrase' => 'required',
            'origin_description' => 'required',
        ]);

        if ($request->file('avatar')) {
            $validAvatar = Validator::make($request->all(), [
                'avatar' => 'nullable|mimes:jpeg,jpg,png|max:8000',
            ]);

            if ($validAvatar->fails()) {
                return response()->json([
                    'success' => false,
                    'error' => $validAvatar->errors()->first()
                ]);
            }
        }

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'error' => $validator->errors()->first()
            ]);
        }

        return $next($request);
    }
}
