<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccountTrackingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //
    public function index()
    {
        $userid = session('user_id'); 
        $student = DB::table('student')                
                    ->where('user_id', $userid )
                    ->first();

        $accounts = DB::table('enrollment')
                    ->join('bill','enrollment.id','=','bill.enrollment_id')
                    ->select('bill.*','bill.id as bill_id','bill.status as bill_status')
                    ->where('enrollment.student_id',$student->id)
                    ->where('enrollment.school_year_id',session('school_year_id'))
                    ->get();   
        //dd($accounts);  
        
        
        return view('account.index',compact('accounts'));
    }

    public function billDetails($id)
    {
        $billDetails = DB::table('bill_fees')
                    ->join('fees','bill_fees.fee_id','=','fees.id')
                    ->select('bill_fees.*','fees.fee_name')
                    ->where('bill_fees.bill_id',$id)
                    ->get();
        
        $total_amount = $billDetails->sum('amount');
        //dd($total_amount);

        return view('account.billDetails',compact('billDetails','total_amount'));
    }
    public function payments($id)
    {
        $billPayments = DB::table('bill')
                    ->join('bill_payment','bill.id','=','bill_payment.bill_id')
                    ->where('bill.id',$id)
                    ->get();

        $total_payment = $billPayments->sum('amount');
        //dd($billPayments);

        return view('account.payments',compact('billPayments','total_payment'));
    }
}
