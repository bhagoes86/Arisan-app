<?php

class FrontendController extends BaseController {

	public function getIndex(){
		$dataanggota = Anggota::select('namaanggota.*')
				->get();
		return View::make('index', array(
			'dataanggota' => $dataanggota
			));
	}

	public function tambahAnggota(){

			$input = Input::all();

		 	$aturan = array(
		 		'nama'     => 'required',
		 		'alamat' => 'required',

		 		);

		 	$pesan = array(
		 		'nama' => 'inputan nama wajib diisi.',
		 		'alamat' => 'inputan alamat wajib diisi.',

		 		);

		 	#validator
		 	$validasi = Validator::make($input, $aturan, $pesan);

		 	#bila validasi  gagal
		 	if($validasi->fails()){
		 		return Redirect::back()->with('gagal', 'Penambahan anggota gagal disimpan, coba cek masukan!!!')->withErrors($validasi)->withInput();
		 	}else{
		 		$no = Anggota::select('namaanggota.*')->limit(1)->orderby('namaanggota.No', 'DESC')
		 				->get();
		 		foreach ($no as $no) {
		 			$nomax = $no->No;
		 		}
		 		$newNo = $nomax + 1;
		 		$anggota = new Anggota;

		 		$anggota->No        		 = $newNo;
		 		$anggota->NamaAnggota        = Input::get('nama');
			    $anggota->Alamat  		     = Input::get('alamat');
			    $anggota->save();

			    return Redirect::back()->with('message', 'Anggota berhasil ditambahkan');
	}
	}

	public function editAnggota(){
		$no = Input::get('no');
		$anggota = Anggota::where('namaanggota.No', '=', $no)
				->select('namaanggota.*')
				->first();
		$anggota->NamaAnggota = Input::get('nama');
		$anggota->Alamat = Input::get('alamat');
		$anggota->save();

		return Redirect::back()->with('messageupdated', 'berhasil disimpan');
	}

	public function hapusAnggota(){
		$no = Input::get('no');
		$anggota = Anggota::where('No', '=', $no)
					->select('namaanggota.*')
					->first();
		$anggota->delete();

		return Redirect::back()->with('messagehapus', 'Anggota berhasil dihapus');
	}

	public function pemenang(){

		$pemenang = Anggota::where('KocokArisan', '=', 'belum menang')
				->where('StatusBayar', '=', 'sudah bayar')
				->select('namaanggota.*')->limit(1)->orderBy(DB::raw('RAND()'))->get();
		return View::make('pemenang', array(
			'pemenang' => $pemenang
			));
	}

	public function updatedPemenang(){
		$no = Input::get('no');
		$anggota = Anggota::where('namaanggota.No', '=', $no)
				->select('namaanggota.*')
				->first();
		$anggota->KocokArisan = 'sudah menang';
		$anggota->save();

		$log = new Logpemenang;

		$log->No = $no;
		$log->save();

		return Redirect::route('index');
	}

	public function bayarAnggota(){
		$no = Input::get('no');
		$anggota = Anggota::where('namaanggota.No', '=', $no)
				->select('namaanggota.*')
				->first();
		$anggota->StatusBayar = 'sudah bayar';
		$anggota->save();

		$bayar = new Logpembayaran;
		$bayar->No = $no;
		$bayar->save();

		return Redirect::back()->with('messageupdated', 'berhasil disimpan');
	}

	public function getBayar(){
		$bayar = Logpembayaran::join('namaanggota', 'logpembayaran.No', '=', 'namaanggota.No')
						->select('logpembayaran.*', 'namaanggota.*', 'logpembayaran.created_at as tanggalpembayaran')
						->get();

		return View::make('logpembayaran', array(
			'bayar' => $bayar
			));
	}

	public function getlogmenang(){
		$menang = Logpemenang::join('namaanggota', 'logpemenang.No', '=', 'namaanggota.No')
						->select('logpemenang.*', 'namaanggota.*', 'logpemenang.created_at as tanggalpembayaran')
						->get();

		return View::make('logpemenang', array(
			'menang' => $menang
			));
	}


}
