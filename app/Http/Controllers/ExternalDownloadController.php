<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExternalDownloadController extends Controller
{

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
}
