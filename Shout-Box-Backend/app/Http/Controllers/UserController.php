<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    function display($id)
    {
        $user = User::find($id);
        return response()->json($user);
    }

    function login(Request $request)
    {
        $credentials = $request->only(['email', 'password', 'isapproved', 'role']);
        $user = User::where('email', $request->email)->first();

        //dd($user->isapproved === true);
        if (!$user->isapproved) {
            return response()->json(["message" => "Not approved", "error" => "asdfasdfnjasjkdf"]);
        }
        //dd($user->role == "user");
        if ($user->role == "admin") {
            return response()->json(["message" => "Not user", "error" => "Not user"]);
        }
        // dd(!($user->role === "user" && $user->isapproved === true) && (!$user || !Hash::check($request->password, $user->password)));
        //!($user->role === "user") && ($user->isapproved === true) &&
        if ((!$user || !Hash::check($request->password, $user->password))) {
            return response()->json(["message" => "invalid", 'error' => 'invalid  Credential']);
        }
        return response()->json($user);
        //return response()->json($user->createToken('auth')->plainTextToken);
        //return response()->json(['message' => 'Login Successful']);
        // return response()->json(($user->id));

    }

    function register(Request $request)
    {
        $credentials = $request->all();
        $credentials['password'] = Hash::make($credentials['password']);
        $user = User::create($credentials);
        //auth()->login($user);
        return response()->json($user);
    }

    public function logout(Request $request)
    {
        request()->session()->regenerate(true);
        request()->session()->flush();
        return redirect('/login');
    }

    // public function getUserByRoleAndIsapproved()
    // {
    //     $users = User::all()->where('role', 'user')->where('isapproved', '0');
    //     //return $users;
    //     return view('pendingusers', ['users' => $users, 'layout' => 'getUserByRole']);
    // }

    // public function updatestatus($id)
    // {
    //     $user = User::find($id)->update(['isapproved' => 1]);
    //     return response()->json(['success' => 'Status change successfully.']);
    //     //
    // }
}