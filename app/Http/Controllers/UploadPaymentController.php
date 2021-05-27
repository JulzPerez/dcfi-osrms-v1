<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Student;
use App\UploadPayment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UploadPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userid = \Auth::user()->id;
        $student = Student::where('user_id', $userid)->first();

        if($student != null)
        {
            $student_id = $student->id;
            $payments = DB::table('upload_payment')
                            ->where('student_id', '=', $student_id)
                            ->get(); 

            //dd($requirements);

            return view('payment.index', compact('payments'));
        }
        else
        {
            $payments = null;
            return view('payment.index', compact('payments'));
        }
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
        $this->validate($request, [
            'amount' => 'required|numeric',
            'payment_for' => 'required|max:191',
            'file' => 'required|file|mimes:zip,pdf,jpg,jpeg,bmp,png,doc,docx,csv,rtf,xlsx,xls,txt',
        ]);

        $userid = \Auth::user()->id;

        $student = DB::table('student')
                        ->where('user_id', $userid)
                        ->first();
        $student_id = $student->id;
        
            $file = $request->file('file');

            if($file != null)
            {
                $filename = $student_id.'_'.time().'_'.$file->getClientOriginalName();          
                 // Save the file
                $path = $file->storeAs('payments', $filename);
                //dd($path);
            }           
        
        UploadPayment::create([
            'student_id' => $student_id,
            'payment_for' => $request['payment_for'],
            'amount' => $request['amount'],
            'notes' => $request['notes'],
            'proof' => $filename
        ]); 

        return redirect('/payment')->with('success', 'Payment uploaded successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->download(storage_path('app/public/payments/' . $id));
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
