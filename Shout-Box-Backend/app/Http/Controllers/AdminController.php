<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function adminView()
    {
        return view('admin');
    }
    function adminlogin(Request $request)
    {

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        // $credentials = $request->only('email', 'password');
        $user = User::where('email', $request->email)->first();

        if (!$user->isapproved) {
            return response('Oppes! You are not approved');
        }
        if ($user->role == "user") {
            return response('Oppes! You are not a authenticated user');
        }
        //!($user->role === "admin") && ($user->isapproved === true) &&
        if (!($user->role === "admin") && ($user->isapproved === true) && (!$user || !Hash::check($request->password, $user->password))) {
            return view('admin')->with('error', 'Oppes! You have entered invalid credentials');
        } else {
            return view('welcome');
        }

        return response($user);
    }


//admin functionality:

public function getUserByRole()
{
     $users = User::all()->where('role','user')->where('isapproved','1');
     //return $users;
     return view('home', ['users'=>$users, 'layout' => 'getUserByRole']);



}



public function getUserByRoleAndIsapproved()
{
     $users = User::all()->where('role','user')->where('isapproved','0');
     //return $users;
     return view('home', ['users'=>$users, 'layout' => 'getUserByRoleAndIsapproved']);



}




public function deleteUser($id)
{
    $user = User::find($id);
    $user->delete();
    //  return response()->json(['success'=>'Status change successfully.']);
    return redirect('/getAllloginUsers');

    //
}


public function updatestatus($id)
{ $user = User::find($id)->update(['isapproved'=> 1]);

//  return response()->json(['success'=>'Status change successfully.']);

    return redirect('/users');
}


public function reject($id)
{ $user = User::find($id)->delete();

//  return response()->json(['success'=>'Status change successfully.']);
return redirect('/users');
}



//----------------Posts------------------------------------

public function getAllPosts()
{
    $users = DB::table('posts')
    ->join('users', 'posts.user_id', '=', 'users.id')

    ->select('posts.*','users.firstname','users.lastname')
    ->get();
    //return $users;
    return view('home', ['users' => $users, 'layout' => 'getAllPosts']);

}



public function deletePost($id)
{
    $post = Post::find($id);
    // dd($post);
    $post->delete();
    // return response()->json(['success'=>'Status change successfully.']);
    return redirect('/getAllPosts');

}


//-------------------Report-----------------

public function getReportedShouts()
{
    $users = DB::table('posts')
    ->join('reports', 'posts.id', '=', 'reports.post_id')
    ->join('users', 'users.id', '=', 'posts.user_id')
    ->select('posts.*', 'reports.issue','users.firstname','users.lastname')
    ->get();
   // return $users;
    return view('home', ['users' => $users, 'layout' => 'getReportedShouts']);



}


public function deleteReportedShouts($id)
{
    $post = Post::find($id);
    $post->delete();
    //  return response()->json(['success'=>'Status change successfully.']);
    return redirect('/getReportedShouts');

    //
}


//






    



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    // $credentials = $request->only(['email', 'password', 'isapproved', 'role']);
    // $user = User::where('email', $request->email)->first();

    // if (!$user->isapproved) {
    //     return response()->json(["message" => "Not approved", "error" => "Not permitted"]);
    // }
    // if ($user->role == "user") {
    //     return response()->json(["message" => "Not Admin", "error" => "Not authorized Admin"]);
    // }
    // if (!($user->role === "admin") && ($user->isapproved === true) && (!$user || !Hash::check($request->password, $user->password))) {
    //     return response()->json(['error' => 'invalid  Credential'], 400);
    // }
    // return response()->json($user);

}