<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Bio;

class BioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    // public function addBio(Request $req)
    // {
    //     $user_id=$req->user_id;
    //     $user = User::find($user_id);
        
    //     $bio = new Bio;
    //     $bio->work = $req->work;
    //     $bio->college = $req->college;
    //     $bio->school = $req->school;
    //     $bio->location = $req->location;
    //     $bio->native_place = $req->native_place;

    //     $user->bio()->save($bio);
    //     // $user->bio()->update($bio);
       
    // }
    public function updateBio(Request $req,$id)
    {
        
        $user_id=$id;
        $user = User::find($user_id);
        // $length=$user->bio()->get();
        // $bio=Bio::where('user_id',$user_id)->get();
        // dd($user->bio);
        // dd($bio);
        if($user->bio === null)
        {
        $bio = new Bio;
        $bio->work = $req->work;
        $bio->college = $req->college;
        $bio->school = $req->school;
        $bio->location = $req->location;
        $bio->native_place = $req->native_place;
        $user->bio()->save($bio);
        }
        else{
        $user->bio->work = $req->work;
        $user->bio->college = $req->college;
        $user->bio->school = $req->school;
        $user->bio->location = $req->location;
        $user->bio->native_place = $req->native_place;
        $user->push();
        }
        // $user->bio()->update([$bio]);
        // $bio=$user->bio()->get();
        // dd($bio);
        // $bio->work = $req->work;
        // $bio->college = $req->college;
        // $bio->school = $req->school;
        // $bio->location = $req->location;
        // $bio->native_place = $req->native_place;
        // return "updated";
    }

    public function getBioOfUser($id)
    {
        $bio = User::find($id)->bio()->get();
        // dd($bio);
        return $bio;
    }
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
}
