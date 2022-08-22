<?php

namespace App\Http\Controllers;
use Auth;
use DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\data_karyawan;
use App\Models\data_pegawai;

class DashboardController extends Controller
{
	protected $storage;

	public function __construct(){
		$this->storage = Storage::disk('public');
	}
	public function index($id)
	{
		// $id = Auth::user()->id;
		$data= DB::table('data_pegawai')->where('id','=', $id)->first();
		$imageData = DB::table('data_karyawan')->where('created_by','=', $id)->orderBy("created_at", "desc")->get();
		$qr = \QrCode::size(290)->generate(\Request::url());
		\QrCode::generate(\Request::url(), public_path('images/qrcode.svg') );
		if(!!$data && !!$imageData){
			return view('dashboard',['data' => $data])->with(['imageData' => $imageData])->with(['qr' => $qr]);
		}
		else
		{
			return view('post');
		}
	}

	public function imageUploadPost(Request $request)
	{       
		$request->validate([
			'caption' => 'required',
			'filename' => 'required',
			'filename.*' => 'mimes:doc,docx,PDF,pdf,jpg,jpeg,png|max:2000'
		]);
		$post= new data_karyawan();
		$id = Auth::user()->id;
		$post = data_karyawan::where('created_by','updated_by', $id)->first();
		if ($request->hasfile('filename') && $request->has('caption')) {            
			$filename = round(microtime(true) * 1000).'-'.str_replace(' ','-',$request->file('filename')->getClientOriginalName());
			$request->file('filename')->move(public_path('storage/images'), $filename);
			$post = data_karyawan::create(
				[              
					'caption' =>$request->caption,          
					'data_file' =>$filename,
					'created_by' =>$id,
					'updated_by' =>$id
				]
			);
			return redirect()->route('dashboard', $id);
			// return redirect('dashboard');
		}else{
			echo'Gagal';
		}
	}
	public function viewImage($id){
		// $imageData= data_karyawan::all();
		// return view('dashboard', compact('imageData'));
		$id = Auth::user()->id;
		$user= DB::table('data_pegawai')->where('id','=', $id)->first();
		$imageData = DB::table('data_karyawan')
		->join('data_pegawai', 'data_pegawai.id', '=', 'data_karyawan.created_by')
		->select('data_pegawai.id', 'data_pegawai.nama', 'data_karyawan.id', 'data_karyawan.data_file', 'data_karyawan.caption', 'data_karyawan.created_at', 'data_karyawan.created_by')
		->where('data_karyawan.created_by', '=', $id)
		->orderBy('data_karyawan.created_at', "desc")
		->get();
		return view('post', ['imageData' => $imageData])->with(['user' => $user]);
	}
	public function pegawai()
	{
		$pegawai = data_pegawai::all();
		return view('dashboard', compact('pegawai'));
	}
	public function ubahpegawai($id)
	{
		$data= DB::table('data_pegawai')->where('id','=', $id)->first();
		$pegawaiubah = data_pegawai::select('*')
		->where('id', $id)
		->get();
		// $pegawaiubah = data_pegawai::findOrFail($id);

		return view('ubahpegawai', ['pegawaiubah' => $pegawaiubah])->with(['data' => $data]);
	}
	public function updatepegawai(Request $request)
	{
		// $pegawaiubah = data_pegawai::where('id', $request->id)
		// ->update([
		// 	'nama' => $request->nama,
		// 	'nik' => $request->nik,
		// 	'email' => $request->email,
		// 	'alamat' => $request->alamat,
		// 	'bio' => $request->bio
		// 	// 'no_hp' => $request->no_hp,
		// ]);
		$id = Auth::user()->id;
		$request->validate([
			'nama'     => 'required',
			'jabatan'     => 'required',
			'file_profile'   => 'nullable',
			'file_sampul'   => 'nullable',
			'bio'     => 'required'
		]);
		// $nama = $request->input('nama');
		// $jabatan = $request->input('jabatan');
		// $nama = $request->input('bio');

		$id = Auth::user()->id;
		$pegawaiubah = data_pegawai::where('id', $id)->first();
		// dd($pegawaiubah);
		if($request->file('file_sampul') == "" && $request->file('file_profile') == "") {
			$pegawaiubah->update([
				'nama' => $request->nama,
				'jabatan' => $request->jabatan,
				// 'file_profile' => $file_profile->hashName(),		
				'bio' => $request->bio
			]);


		} else if($request->file('file_profile') == "") {
			$temp_sampul = $pegawaiubah->file_sampul;
			// dd($temp);
			$file_sampul = $request->file_sampul;
			$filesampul = $file_sampul->hashName();
			// $destinationPath = ;	
			$file_sampul->storeAs('public/images', $filesampul);

			$update = $pegawaiubah->update([
				'nama' => $request->nama,
				'jabatan' => $request->jabatan,
				'file_sampul' => $file_sampul->hashName(),
				'bio' => $request->bio
			]);
			if ($update) {
				$this->storage->delete($temp_sampul);
				// dd($this);
			}
		} else if($request->file('file_sampul') == ""){
			$temp = $pegawaiubah->file_profile;
			$file_profile = $request->file_profile;
			$filename = $file_profile->hashName();
			$file_profile->storeAs('public/images', $filename);
			$update = $pegawaiubah->update([
				'nama' => $request->nama,
				'jabatan' => $request->jabatan,
				'file_profile' => $file_profile->hashName(),
				'bio' => $request->bio
			]);

		} else if(!empty($request->file('file_sampul')) && !empty($request->file('file_profile'))){
			$file_sampul = $request->file_sampul;
			$filesampul = $file_sampul->hashName();
			$file_sampul->storeAs('public/images', $filesampul);

			$file_profile = $request->file_profile;
			$filename = $file_profile->hashName();
			$file_profile->storeAs('public/images', $filename);

			$pegawaiubah->update([
				'file_profile' => $file_profile->hashName(),
				'file_sampul' => $file_sampul->hashName()
			]);


		}
		// return redirect()->back()->with('alert', 'sukses');
		// return redirect('dashboard');
		return redirect()->route('dashboard', $id);
	}
	public function generate ()
	{
		\QrCode::size(500)
		->generate(Request::url(), public_path('images/qrcode.png'));
		return view('dashboard',$data);

	}
}
