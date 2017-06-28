<?php

namespace App\Http\Controllers;

use DB;
use Input;
use Excel;
use App\Models\LapKeuangan;
use Illuminate\Http\Request;

class LapKeuanganController extends Controller
{
	public function index() {
		return view('index');
	}

	// import file
	public function importFile()
	{
		// cek file
		if(Input::hasFile('file')){
			// file 
			$file = Input::file('file');
			
			// upload file
			$data = Excel::load($file, function($reader) {
			})->get();

			// cek data 
			if(!$data->isEmpty()){
				foreach ($data as $value) {
					$insert[] = [
						'tanggal' => $date = date('Y-m-d', strtotime(str_replace('-', '/', $value->tanggal))),
						'keterangan' => ucwords($value->keterangan),
						'debet' => $value->debet,
						'kredit' => $value->kredit,
						'saldo' => $value->saldo
					];
				}
				// insert data ke database
				DB::table('laporan_keuangan')->insert($insert);
				
				return redirect('/');
				
			}
		}
		return back();
	}

	// export file
    public function exportFile($type)
	{
		// data database
		$data = LapKeuangan::all();

		// total 
		$total_debet  = DB::table('laporan_keuangan')->sum('debet');
		$total_kredit = DB::table('laporan_keuangan')->sum('kredit');
		$total_saldo  = DB::table('laporan_keuangan')->sum('saldo');


		// download file 
		return Excel::create('file', function($excel) use ($data, $total_debet, $total_kredit, $total_saldo) {
			$excel->sheet('laporan keuangan', function($sheet) use ($data, $total_debet, $total_kredit, $total_saldo)
	        {
	        	// tambah data ke sheet
				// $sheet->with($data);
				$sheet->loadView('file')
					  ->with('data', $data)
					  ->with('total_debet', $total_debet)
					  ->with('total_kredit', $total_kredit)
					  ->with('total_saldo', $total_saldo);

				$sheet->setOrientation('landscape');
	        });

		})->store($type, public_path('file'))->download($type);
	}
}
