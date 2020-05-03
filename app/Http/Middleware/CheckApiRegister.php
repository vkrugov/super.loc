<?php

namespace App\Http\Middleware;

use App\Enums\GenderEnum;
use Closure;
use Illuminate\Support\Facades\Validator;

class CheckApiRegister
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
            'name' => 'required|max:255',
            'email' => 'required|email|unique:user',
            'gender' => 'required|in:' . implode(',', GenderEnum::toArray()),
            'password' => 'required|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'error' => $validator->errors()->first(),
            ]);
        }

        return $next($request);
    }
}
