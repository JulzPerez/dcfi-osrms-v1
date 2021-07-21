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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userid = \Auth::user()->id;
        session(['user_id'=> $userid ]);

        $student = DB::table('student')
                    ->select('id')
                    ->where('user_id', $userid )
                    ->first();
                //dd($student);

        if($student != null)
        {
            session(['student_id'=> $student->id ]);
        }            
        else
            session(['student_id' => null]);        

        //dd(session('student_id'));

        return view('home');
    }
   
}
