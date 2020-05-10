<?php

namespace App\Http\Controllers;

use App\Rs;

use Session;

use Illuminate\Http\Request;
use App\Exports\RsExport;
use App\Imports\RsImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class RsController extends Controller
{
  public function index()
  {
    $rs = Rs::all();
    return view('rs',['rs'=>$rs]);
  }

  public function export_excel()
  {
    return Excel::download(new RsExport, 'rs.xlsx');
  }

  public function import_excel(Request $request)
	{
		// validasi
		$this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);

		// menangkap file excel
		$file = $request->file('file');

		// membuat nama file unik
		$nama_file = rand().$file->getClientOriginalName();

		// upload ke folder file_rs di dalam folder public
		$file->move('file_rs',$nama_file);

		// import data
		Excel::import(new RsImport, public_path('/file_rs/'.$nama_file));

		// notifikasi dengan session
		Session::flash('sukses','Data Siswa Berhasil Diimport!');

		// alihkan halaman kembali
		return redirect('/rs');
	}
}
