<?php

namespace App\Http\Controllers\API\V1;

// namespace App\Http\Controllers;


// use App\Http\Requests\Products\ProductRequest;
// use App\Http\Controllers\API\V1\BaseController;
// use App\Http\Controllers\Controller;

// use Illuminate\Http\Request;
// use Session;

use Illuminate\Support\Facades\DB;


use App\Models\DuaBelas;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DuaBelasExport;
use App\Imports\DuaBelasImport;
use Illuminate\Database\QueryException;
use Symfony\Component\HttpFoundation\Response;
// use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;



// use App\Models\Tag;
// use Illuminate\Http\Request;

class DuaBelasController extends BaseController
{
    public function index()
    {
        $product = DuaBelas::orderBy('id', 'DESC')->get();

        $response = [
            'massage' => 'List Product order BY time',
            'data' => $product
        ];

        return response()->json($response, Response::HTTP_OK);
    }

    public function export_excel()
    {
        return Excel::download(new DuaBelasExport, 'index.xlsx');
    }



    public function saveExel(Request $request)
    {
        // return $request->all();
        $path = $request->file('select_file')->getRealPath();
        Excel::import(new DuaBelasImport, $path);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaction = DuaBelas::findOrFail($id);
        $response = [
            'massage' => 'Detail of transaction resource',
            'data' => $transaction
        ];

        return response()->json($response, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaction = DuaBelas::findOrFail($id);


        try {
            $transaction->delete();
            $response = [
                'massage' => 'Transaction deleted'
            ];

            return response()->json($response, Response::HTTP_OK);
        } catch (QueryException $e) {
            return response()->json([
                'massage' => "Failed " . $e->errorInfo
            ]);
        }
    }
}
