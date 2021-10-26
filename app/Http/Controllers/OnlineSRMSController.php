<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Student;


class OnlineSRMSController extends Controller
{

    public function index()
    {
        return view('srmsOnline');
    }

    public function OnlineSRMSUser(Request $request)
    {
        $this->validate($request, [
            'student_id' => 'required',
            'email' => 'required|string|unique:users|max:191',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|string',

        ]);

        $student = DB::table('student')
                    ->where('id', $request['student_id'])
                    ->first();
        
        //dd($student_count);
                
        if($student != null )
        {
            $student_userID = $student->user_id;

           /*  if($student_userID == null)
            { */
                $fname = $student->first_name;
                $lname = $student->last_name;

                $user_id = DB::table('users')->insertGetId([
                    'first_name' => $fname,
                    'last_name' => $lname,
                    'email' => $request['email'],
                    'password' => Hash::make($request['password']),
                ]);

                $student = Student::find($request['student_id']);
                $student->user_id = $user_id;            
                $student->save();

                $credentials = $request->only('email', 'password');

                //dd($credentials);

                if (Auth::attempt($credentials)) {
                    // Authentication passed...
                    //dd($credentials);
                    return redirect()->intended('/');                    
                }

           /*  }
            else
            {
                return redirect()->back()->withErrors('You already have an account! Enter credentials to login! ');
            } */
                
        }

        else
        {
            return redirect()->back()->withErrors('Student ID does not exist!');
        }        
    }
   
}
