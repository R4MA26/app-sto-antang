<?php

namespace App\Http\Controllers;

// UsersController
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;

class UsersController extends Controller
{
    public function import(Request $request)
    {
        $request->validate([
            'import_file' => 'required|file|mimes:xls,xlsx'
        ]);

        $path = $request->file('import_file');
        $data = Excel::import(new UsersImport, $path);

        return response()->json(['message' => 'uploaded successfully'], 200);
    }
}