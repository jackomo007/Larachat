<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subscribeds = DB::table('projects')
                    ->join('project_participants', 'projects.id', '=', 'project_participants.project_id')
                    ->join('users', 'project_participants.user_id', '=', 'users.id')
                    ->where('users.id',auth()->user()->id)
                    ->select('projects.*')
                    ->get();

        $unsubscribeds = DB::table('projects')
                    ->join('project_participants', 'projects.id', '=', 'project_participants.project_id')
                    ->where('project_participants.user_id','!=',auth()->user()->id)
                    ->whereNotIn('project_participants.project_id', $subscribeds->pluck('id'))
                    ->select('projects.*')
                    ->get();
        return view('home',['subscribeds' => $subscribeds,'unsubscribeds' => $unsubscribeds->unique()]);
    }
}
