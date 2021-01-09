<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Report;
use App\Models\Post;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = Post::select('posts.user_id','posts.id')
        ->join('reports','posts.id', '!=', 'reports.post_id')
            ->where('posts.user_id', '!=', 'reports.user_id')


            ->get();

        // $courses = Report::all();
      //  return Report::all();
      return $user;

        //  return view('report', ['courses'=>$courses, 'layout' => 'index']);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $report = Report::all();
        return view('report', ['report' => $report, 'layout' => 'create']);

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
        // $Post = Post::find(1);

        $report = new Report();

        $report->issue = $request->input('city');
        $report->post_id = $request->post_id;
        $report->user_id = $request->user_id;

        // $Post=$Post->reports()->save();
        $report->save();
        return $report;
        //
    }


    public function isReported(Request $request)
    {
        // $Post = Post::find(1);

        $report = new Report();

        $report1 = Report::all();

        foreach ($report1 as $report1) {

            if ($report1->user_id == $request->user_id && $report1->post_id == $request->post_id) {
                return "already reported";
            }
        }


        $report->post_id = $request->input('post_id');
        $report->user_id = $request->input('user_id');

        $report->issue = $request->input('issue');

        // $Post=$Post->reports()->save();
        $report->save();
        return $report;








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