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
        $userid = \Auth::user()->id;
        $student = DB::table('student')                
                    ->where('user_id', $userid)
                    ->first();
        $SY = DB::table('school_year')
                    ->where('current',1)->first();  
        //dd($student);

        if($student != null)
        {

            $accounts = DB::table('enrollment')
                    ->join('bill','enrollment.id','=','bill.enrollment_id')
                    ->select('bill.*','bill.id as bill_id','bill.status as bill_status')
                    ->where('enrollment.student_id',$student->id)
                    ->where('enrollment.school_year_id',$SY->id)
                    ->first();

            if($accounts != null)
            {
                $bill_id = $accounts->id;
                $billPayments = DB::table('bill')
                        ->join('bill_payment','bill.id','=','bill_payment.bill_id')
                        ->where('bill.id',$bill_id)
                        ->get();
                $total_payment = $billPayments->sum('amount');

                $billDetails = DB::table('bill_fees')
                        ->join('fees','bill_fees.fee_id','=','fees.id')
                        ->select('bill_fees.*','fees.fee_name')
                        ->where('bill_fees.bill_id',$bill_id)
                        ->get();
            
                $total_fees = $billDetails->sum('amount');

                $outstanding_balance = $total_fees-$total_payment;
           
                return view('account.index',compact('accounts','outstanding_balance','SY'));
            }
            else{
                return view('account.noAccounts',compact('SY'));
            }
        }
        else{
              
            return view('enrollment.noStudent');
        }
        
        
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
