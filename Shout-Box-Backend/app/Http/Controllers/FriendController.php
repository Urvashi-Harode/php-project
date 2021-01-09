<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;

use Illuminate\Support\Collection;

class FriendController extends Controller
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getAllUsers($id)
    {
        // error_log($request->user_id);
        // $user_id=$request->user_id;
        $user_id=$id;
        $users = User::all();
        //getting all user except logged in user
        $allusers = $users->except($user_id);
        // dd($allusers);

        //getting friends of that users
        $friends=User::find($user_id)->friends()->get();

        //primary keys of that users
        $keys=$friends->modelKeys();
       
        //getting users which are not in friends_user table
        $finalusers = $allusers->except($keys);
        // dd($finalusers);
        return $finalusers;
    }

    public function getFriendsPosts($id){

        $friends=User::find($id)->friends()->wherePivot('isfriend',1)->get();
        $keys=$friends->modelKeys();
        $posts=Post::whereIn('user_id',$keys)->latest()->get();
        // dd($posts);
        // $post=$users->posts()-get();
        // $post = User::find(4)->posts()
        // ->where('user_id', 4)
        // ->take(2)->get();



        // $posts=Post::all();
        // $post=$posts->find($keys);
        // $post=Post::find($keys)->get();
        
        
        return $posts;

        }
        // public function PostOfFriends($friend_id)
        // {
           
        //     $posts=Post::where('user_id',$friend_id)->get();
        //     // dd($posts);
        //     return $posts;
        // }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addFriend(Request $request)
    {
       $user_id=$request->user_id;
       $friend_id=$request->friend_id;
        
        $friend=User::find($user_id)->friends()->wherePivot('friend_id',$friend_id)->get();
        $count=count($friend);

        if($count === 1)
        {
            return "you are already friend";
        }
        else{
        $user = User::find($user_id); 
        $user->friends()->attach($friend_id);

        $friend = User::find($friend_id);       // find your friend, and...
        $friend->friends()->attach($user_id);
       return "record added successfully";
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function acceptRequest(Request $request)
    {
        $user_id=$request->user_id;
       $friend_id=$request->friend_id;

       $user = User::find($user_id); 
       $user->friends()->updateExistingPivot($friend_id,[
           'isfriend' => true,
       ]);

       $friend = User::find($friend_id); 
       $friend->friends()->updateExistingPivot($user_id,[
           'isfriend' => true,
       ]);
       return "friend request accepted successfully"; 
    }

    public function rejectRequest($user_id,$friend_id)
    {
       
    //    $user_id=1;
      
        error_log($user_id);
        $friend = User::find($friend_id);       
         $friend->friends()->detach($user_id);

        $user = User::find($user_id); 
        $user->friends()->detach($friend_id);
        
        // return redirect('/');
    }
    public function allAcceptedFriends($id)
    {
        $accepted=User::find($id)->friends()->wherePivot('isfriend',1)->get();
        //$pending=User::find(1)->friends()->wherePivot('isfriend',0)->get();
        //dd($accepted);
        //dd($pending);
        return $accepted;
        //return view('friends',['accepted'=>$accepted,'pending'=>$pending,'layout'=>'show']);

    }

    public function allPendingRequest($id)
    {
        
        $pending=User::find($id)->friends()->wherePivot('isfriend',0)->get();
        
        //dd($pending);
        return $pending;
        

    }


    public function isFriend($user_id,$friend_id)
    {
        // $userid=1;
        
        $friend=User::find($user_id)->friends()->wherePivot('isfriend',1)->wherePivot('friend_id',$friend_id)->get();
        // $count=count($friend);
        // dd( $friend);
        return $friend;
       


        //$allPosts = Post::with('user')->where('user_id', $id)->get();
        
        // if($count === 1)
        // {
            
        //     return $friend;

        // }
        
      
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
