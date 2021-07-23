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
        $accounts = DB::table('enrollment')
                    ->join('bill','enrollment.id','=','bill.enrollment_id')
                    ->select('bill.*','bill.id as bill_id')
                    ->where('enrollment.student_id',session('student_id'))
                    ->where('enrollment.school_year_id',session('school_year_id'))
                    ->get();
        /* dd($accounts);
        session(['bill_id' => $accounts->bill_id]); */

        return view('account.index',compact('accounts'));
    }
    public function billDetails($id)
    {
        $billDetails = DB::table('bill_fees')
                    ->join('fees','bill_fees.fee_id','=','fees.id')
                    ->select('bill_fees.*','fees.fee_name')
                    ->where('bill_fees.bill_id',$id)
                    ->get();
        //dd($billDetails);

        return view('account.billDetails',compact('billDetails'));
    }
    public function payments($id)
    {
        $billPayments = DB::table('bill_payment')
                    ->where('bill_id',$id)
                    ->get();
        //dd($billPayments);

        return view('account.payments',compact('billPayments'));
    }
}
