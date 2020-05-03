<?php

namespace App\Http\Controllers;

use App\Enums\GenderEnum;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getGenders()
    {
        return response()->json(GenderEnum::toSelectArray());
    }

    /**
     * @return User[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        return User::all();
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function deleteUser(Request $request)
    {
        return response()->json([
            'success' => User::deleteUser($request->id)
        ]);
    }
}
