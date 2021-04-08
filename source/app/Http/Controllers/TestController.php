<?php

namespace App\Http\Controllers;

use App\Imports\RowsImports;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;


class TestController extends Controller
{
    public function upload(Request $request)
    {
        
        $request->validate(['ifile'=>'file|required']);
        $path = $request->file('ifile')->store('uploaded');
        
        Excel::import(new RowsImports($request->file('ifile')->hashName()), $path);

        return [$path];
    }
}
