<?php

namespace App\Http\Controllers\API\V1;

// namespace App\Http\Controllers;


// use App\Http\Requests\Products\ProductRequest;
// use App\Http\Controllers\API\V1\BaseController;
// use App\Http\Controllers\Controller;

// use Illuminate\Http\Request;
use Session;


use App\Models\Product;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProductsExport;
use App\Imports\ProductImport;
use Illuminate\Database\QueryException;
use Symfony\Component\HttpFoundation\Response;
// use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;



// use App\Models\Tag;
// use Illuminate\Http\Request;

class ProductController extends BaseController
{
    public function index()
    {
        $product = Product::orderBy('id', 'DESC')->get();

        $response = [
            'massage' => 'List Product order BY time',
            'data' => $product
        ];

        return response()->json($response, Response::HTTP_OK);
    }

    public function export_excel()
    {
        return Excel::download(new ProductsExport, 'product.xlsx');
    }



    public function import_excel(Request $request)
    {

        $file = $request->file('file');
        $namaFile = $file->getClientOriginalName();
        $file->move('DataProduct', $namaFile);

        Excel::import(new ProductImport, public_path('/DataProduct' .$namaFile));

        return response()->json(['massage' => 'uploaded succesfully'], 200);

        // // validasi
        // $this->validate($request, [
        //     'file' => 'required|mimes:csv,xls,xlsx'
        // ]);

        // // menangkap file excel
        // $file = $request->file('file');

        // // membuat nama file unik
        // $nama_file = rand() . $file->getClientOriginalName();

        // // upload ke folder file_siswa di dalam folder public
        // $file->move('file_siswa', $nama_file);

        // // import data
        // Excel::import(new ProductImport, public_path('/file_siswa/' . $nama_file));

        // // notifikasi dengan session
        // // Session::flash('sukses', 'Data Siswa Berhasil Diimport!');

        // // alihkan halaman kembali
        // // return redirect('/siswa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaction = Product::findOrFail($id);


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
