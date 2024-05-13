<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    function ckupload(Request $request){
        $uploadedFile = $request->file('upload');

        // Save the file to the desired location
        $filename = $uploadedFile->getClientOriginalName();
        $uploadedFile->move(public_path('uploads'), $filename);

        // Return the URL of the uploaded file
        $url = asset('uploads/' . $filename);

        return response()->json([
            'uploaded' => 1,
            'fileName' => $filename,
            'url' => $url
        ]);
    }
}
