<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        return Post::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {


        // $this->validate($req, [
        //     'multimedia' => 'nullable|mimes:jpeg,png,jpg,gif,mp3,mp4,3gp,svg|max:20489',

        // ]);

        $post = new Post();
        $post->user_id = $req->user_id;
        $post->text = $req->text;
        if ($file = $req->hasFile("multimedia")) {
            $file = $req->file("multimedia");
            $fileName = $file->getClientoriginalName();
            error_log(is_null($fileName));
            $whatIWant = substr($fileName, strpos($fileName, ".") + 1);

            $post->type = $whatIWant;

            $destinationpath = public_path() . '/posts/';



            $file->move($destinationpath, $fileName);
            $post->multimedia = '/posts/' . $fileName;
            // $post->date = $req->date;
        }

        $result = $post->save();

        if ($result) {
            return ["result" => "data saved"];
        } else {
            return ["result" => "operation failed"];
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $post = $user->posts->where('user_id', $id);
        return $post;
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
    public function update(Request $req, $id)
    {

        $post = Post::find($id);
        $post->text = $req->text;
        if ($file = $req->hasFile("multimedia")) {
            $file = $req->file("multimedia");
            $fileName = $file->getClientoriginalName();
            $whatIWant = substr($fileName, strpos($fileName, ".") + 1);

            $post->type = $whatIWant;

            $destinationpath = public_path() . '/posts/';
            $file->move($destinationpath, $fileName);
            $post->multimedia = '/posts/' . $fileName;
        }

        $post->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        // dd($post);
        $post->delete();
    }
}