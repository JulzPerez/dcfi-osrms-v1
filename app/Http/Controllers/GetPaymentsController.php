<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GetPaymentsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if(\Gate::allows('isBFO') )
        {
            return view('downloadPayments.searchForm');
        }
    }

    public function getStudent(Request $request)
    {      
        if(\Gate::allows('isBFO') )
        {
            if($request['searchBy'] == 'ID')
            {
                $result = DB::table('student')
                    ->where('id',$request['searchBy_ID'])
                    ->get();
            }
            else 
            {
                $result = DB::table('student')
                    ->where('last_name',$request['searchBy_lastname'])
                    ->get();
            }
        
            return view('downloadPayments.viewSearchResult', compact('result'));

        }
    }

    public function getStudentPayments($id)
    {
        if(\Gate::allows('isBFO') )
        {
            $payments = DB::table('upload_payment')
                        ->where('student_id',$id)
                        ->get();

            return view('downloadPayments.viewStudentPayment', compact('payments'));
        }
        
    }

    public function downloadFile($id)
    {
        $file = storage_path('app/public/payments/' . $id);

        if(!file_exists($file))
        {
            return response()->json(['msg'=>"File does not exist"]);
        }
        else
        {
            return response()->download($file);
        }
    }

    public function getAllStudents()
    {
        if(\Gate::allows('isBFO') )
        {
            $result = DB::table('upload_payment')
                        ->join('student', 'upload_payment.student_id','=','student.id')
                        ->get();     
        
            return view('downloadPayments.viewSearchResult', compact('result'));

        }
    }
}
