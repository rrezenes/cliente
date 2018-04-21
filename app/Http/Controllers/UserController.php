<?php

namespace cliente\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use cliente\User;
use cliente\Http\Requests\UserRequest;

class UserController extends Controller
{
    public function listUsers()
    {
    	return User::all();
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

        return $user;
    }

    public function updateUser(UserRequest $request, $id)
    {
        //dd($request->all());

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

    	if($user->delete()){
    		return response()->json([
                'message'   => 'User successfully removed',
            ], 200);
    	}
    }
}
