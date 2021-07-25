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
        if(\Auth::check())
        {
            $userid = \Auth::user()->id;
            session(['user_id'=> $userid ]);

            /* $student = DB::table('student')
                        ->select('id')
                        ->where('user_id', $userid )
                        ->first();
                    //dd($student);

            if($student != null)
            {
                session(['student_id'=> $student->id ]);
            }            
            else
            {
                session(['student_id' => null]);
            } */
                        

            $SY = DB::table('school_year')
                    ->where('current',1)->first();
            
            if($SY)
            {
                session(['school_year_id' => $SY->id ] );
                session(['school_year_name'=> $SY->SY ] );
               
            }                
                

            return view('home');
        }
        else{
            //redirect to log-in page
        }
    }
   
}
