<?php

namespace cliente\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use cliente\User;
use cliente\Http\Requests\UserRequest;

use Cache;

class UserController extends Controller
{
    public function listUsers()
    {

        $expiration = 60;

        return Cache::remember("users_", $expiration, function(){

            return User::all();

        });

        
    }

    public function findUser($id)
    {
        $user = User::find($id);

        if(!$user) {
            return response()->json([
                'message'   => 'User not found',
            ], 404);
        }

        return $user;
    }

    public function saveUser(UserRequest $request)
    {

        $user = new User;
        $user->fill($request->all());
        $user->encryptPassword();

        //dd($user);

        $user->save();

        Cache::forget('users_');

        return $user;
    }

    public function updateUser(UserRequest $request, $id)
    {

        $user = User::find($id);

        if(!$user) {
            return response()->json([
                'message'   => 'User not found',
            ], 404);
        }

        $user->fill($request->all());

        if($request->has('password'))
        {
            $user->encryptPassword();
        }

        $user->save();

        Cache::forget('users_');

        return $user;
        
    }

    public function deleteUser($id)
    {
        $user = User::find($id);

        if(!$user) {
            return response()->json([
                'message'   => 'User not found',
            ], 404);
        }

        Cache::forget('users_');

        $user->delete();            

        return response()->json([
            'message'   => 'User successfully removed',
        ], 200);

    }
}
