<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Hashing\BcryptHasher;
use Illuminate\Support\Str;

class UsersController extends Controller
{

    public function add(Request $request)
    {
        $request['api_token'] = Str::random(60);
        $request['password'] = app('hash')->make($request['password']);
        $user = User::create($request->all());
        return response()->json($user);
    }

    public function edit(Request $request, $id)
    {
        $user = User::find($id);
        $user->update($request->all());
        return response()->json($user);
    }

    public function view($id)
    {
        $user = User::find($id);
        
        return response()->json($user);
    }

    public function delete($id)
    {
        User::findOrFail($id)->delete();
        return response('User Deleted Successfully', 200);
    }

    public function index()
    {
        $user = User::get();
        return response()->json($user);
    }
}
