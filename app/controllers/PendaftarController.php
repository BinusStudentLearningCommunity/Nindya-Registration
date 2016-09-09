<?php 
class PendaftarController extends BaseController {
	public function index($column = 'nim', $order = 'asc')
	{
		// menentukan sorting orderBy

		//$cavis = Pendaftar::all();
		if ( Input::get('orderBy') !== null ) {
			$column = Input::get('orderBy');
		}
		if ( Input::get('order') !== null ) {
			$order = Input::get('order');
		}

		//Ambil data dari Database, lalu orderBy $column
		//class DB dari Laravel, mempunyai function member / method table('namaTable') untuk ambil datanya
		$cavis['data'] = DB::table('cavis')->orderBy($column, $order)->get(); //method orderBy('namaKolom', 'asc | desc');

		$cavis['orderBy'] = $column;
		$cavis['order'] = $order;

		return View::make('Pendaftar.index')->with('cavis', $cavis);
	}	
	
	public function update($id)
	{
		$cavis = Pendaftar::find($id);
		return View::make('Pendaftar.update')->with('cavis', $cavis);
	}	
	
	public function edit($id)
	{
			$rules = array(	
				'nim' =>'required',
				'nama' =>'required',
				'gender' => 'required',
				'fakultas' => 'required',
				'jurusan' => 'required',
				'tempat_lahir' => 'required',
				'ttl' => 'required',
				'nomor_telfon' =>'required',
				// 'idline' =>'required',
				'email' => 'required',
				// 'ipk' => 'required',
				'alamat' => 'required',
				//'image' =>'required',
				//'pengalaman_organisasi' => 'required',
				//'penghargaan' => 'required',
				); // | = untuk 2 kondisi validasi atau lebih
			$validator = Validator::make(Input::all(),$rules); // var validator utk manggil input all(masukin input an)dan di testcase)
			
			if($validator -> fails() )
			{
				return Redirect::back()->withErrors($validator)->withInput();
			}
			else 
			{
			$ganti = Pendaftar::findOrFail(Input::get('id'));
			$ganti->nim 					= Input::get('nim');
			$ganti->nama 					= Input::get('nama');
			$ganti->gender 					= Input::get('gender');
			$ganti->fakultas 				= Input::get('fakultas');
			$ganti->jurusan 				= Input::get('jurusan');
			$ganti->tempat_lahir 			= Input::get('tempat_lahir');
			$ganti->ttl						= Input::get('ttl');
			$ganti->nomor_telfon 			= Input::get('nomor_telfon');
			$ganti->idline					= Input::get('idline');
			$ganti->email					= Input::get('email');
			$ganti->ipk						= Input::get('ipk');
			$ganti->alamat					= Input::get('alamat');
			$ganti->pengalaman_organisasi	= Input::get('pengalaman_organisasi');
			$ganti->penghargaan				= Input::get('penghargaan');
			/*$ganti->image 					= Input::file('Image');	
			
				$file = Input::file('Image');
				$picturename = $file->getClientOriginalName();
				$generatpic = rand(1, 255).'updated'.$picturename;
				$picturesize = $file->getSize();
				$pictureext = $file->getClientOriginalExtension();
				$fullpath = $file->move('photo/', $generatpic);
				$realpath = str_replace('\\','/', $fullpath);
				
				$ganti ->clientname = $picturename;
				$ganti ->fullpath = $realpath;
			*/
			
			$ganti->save();
			
			return Redirect::route('Pendaftar.index');
			}
	}
	
	/*public function export(){
    Excel::create('Users', function($excel) {

      $excel->sheet('Users', function($sheet) {
        $users = User::orderBy('created_at','desc')->get();
        $sheet->loadView('admin.users.csv', ['users' => $users->toArray()]);
      });
    })->download('xls');
  }*/
  
  	public function export(){
    	Excel::create('Daftar Cavis', function($excel) {

			$excel->sheet('Daftar Cavis', function($sheet) 
			{
				$sheet->setOrientation('landscape');
				
				$sheet->mergeCells('A1:O1');
				$sheet->row(1, function ($row) {
		            $row->setFontSize(16);
					$row->setAlignment('center');
				});
				$sheet->row(1, array('Daftar Calon Aktivis Nindya 9G'));
				
				$sheet->row(3, function ($row) {
					$row->setFontSize(13);
					$row->setAlignment('center');
					$row->setFontWeight('bold');
				});
				$sheet->row(3, array('Nim','Nama','Gender','Fakultas','Jurusan','Tempat Lahir','Tanggal Lahir','Nomor Telpon','Id Line','E-mail','Ipk','Alamat','Pengalaman Organisasi','Prestasi', 'Jam Interview'));
				
				// $data = Pendaftar::select('Nim','Nama','Gender','Fakultas','Jurusan','Tempat_Lahir','Ttl','Nomor_telfon','Idline','email','ipk','Alamat','Pengalaman_organisasi','Penghargaan')->get()->toArray();

				$data = DB::table('cavis')
					->leftjoin('interviews', 'cavis.nim', '=', 'interviews.cavis_nim')
					->select('Nim','Nama','Gender','Fakultas','Jurusan','Tempat_Lahir','Ttl','Nomor_telfon','Idline','email','ipk','Alamat','Pengalaman_organisasi','Penghargaan', 'jam_interview')
					->get(); //return: array of Object

				$data = json_decode(json_encode($data), true); //make it array of array.

				foreach($data as $data) {
					
					$sheet->appendRow($data);
				}
			});

    	})->download('xls');
  	}
  	
  	/**
  	 * [wordexport description]
  	 * @return [void] [Respone download zip berisi word para cavis yg daftar antara tgl 'from' sampai 'to']
  	 */
	public function wordexport()
	{
		//clear folder
		$files = glob( public_path() . "/cavis-word-temp//*"); // get all file names
		foreach($files as $file){ // iterate files
			if(is_file($file)) 
				unlink($file); // delete file
		}
		if(file_exists(public_path() . "/cavis-word-temp.zip")) 
			unlink(public_path() . "/cavis-word-temp.zip");

		/**
		 * [generateMsWord description]
		 * @param  [Pendaftar] $pendaftar [object dari class Pendaftar]
		 * @return [void]            [description]
		 */
		function generateMsWord($pendaftar)
		{
			$phpWord = new \PhpOffice\PhpWord\PhpWord();
			//Note: any element you append to a document must reside inside of a Section. 

			// Adding an empty Section to the document...
			$section = $phpWord->addSection();
			// Adding Text element to the Section having font styled by default...	
			
			$styleJudul = 'oneUserDefinedStyle';
			$phpWord->addFontStyle(
			$styleJudul,
			array('name' => 'Arial', 'size' => 18, 'color' => '1B2232', 'bold' => true)
			);
			
			$section->addText(
				'Data Diri Mahasiswa Calon Nindya 9G'
				,$styleJudul
			);	
		
			//H-Line
			$section->addLine(
			array(
				'width'       => \PhpOffice\PhpWord\Shared\Converter::cmToPixel(11),
				'height'      => \PhpOffice\PhpWord\Shared\Converter::cmToPixel(0),
				'positioning' => 'absolute',
				)
			);

			$fontStyle = array('name' => 'Arial');
			$paragraphStyle = array('align' => 'right');
			$section->addText('[ Foto 3 x 4 ]', $fontStyle, $paragraphStyle);

			$section->addText(
				'NIM 				: ' . $pendaftar->nim
			);

			$section->addText(
				'Nama 				: ' . $pendaftar->nama
			);	

			$section->addText(
				'Gender 			: ' . $pendaftar->gender
			);	
			
			$section->addText(
				'Fakultas 			: ' . $pendaftar->fakultas
			);
		
			$section->addText(
				'Jurusan 			: ' . $pendaftar->jurusan
			);
		
			$section->addText(
				'TTL 				: ' . $pendaftar->tempat_lahir . ', ' . date_format(date_create($pendaftar->ttl), 'l jS F Y')
			);
		
			$section->addText(
				'Kontak				: ' . $pendaftar->nomor_telfon
			);
		
			$section->addText(
				'Id Line 				: ' . $pendaftar->idline
			);
		
			$section->addText(
				'Email 				: ' . $pendaftar->email
			);	
		
			$section->addText(
				'IPK 				: ' . $pendaftar->ipk
			);
					
			$section->addText(
				'Pengalaman Organisasi	: '
			);
			$section->addText( $pendaftar->pengalaman_organisasi );
			
			$section->addText(
				'Penghargaan / Prestasi 	: '
			);
			$section->addText( $pendaftar->penghargaan );

			// $section->addPageBreak(); //Page Break

			// Adding Text element with font customized using explicitly created font style object...
			$fontStyle = new \PhpOffice\PhpWord\Style\Font();
			$fontStyle->setBold(true);
			$fontStyle->setName('Arial');
			$fontStyle->setSize(12);
			$myTextElement = $section->addText(
			    htmlspecialchars('Pilihan Divisi (diisi setelah Briefing Calon Nindya 9G - 23 September 2016)')
			);
			$myTextElement->setFontStyle($fontStyle);

			$section->addCheckBox('Learning', 'Mentoring');
			$section->addCheckBox('Learning', 'People Development');
			$section->addCheckBox('Learning', 'Competition');
			$section->addCheckBox('Human Capital', 'Engagement');
			$section->addCheckBox('Human Capital', 'Creative and Research');
			$section->addCheckBox('Human Capital', 'Room and Inventory');
			$section->addCheckBox('Marketing', 'Business Development');
			$section->addCheckBox('Marketing', 'Public Relation');
			$section->addCheckBox('Marketing', 'Design');
			$section->addCheckBox('IT Management', 'IT Development');
			$section->addCheckBox('IT Management', 'IT Maintenance');
			$section->addCheckBox('IT Management', 'Datawarehouse');
		
			/*
			* Note: it's possible to customize font style of the Text element you add in three ways:
			* - inline;
			* - using named font style (new font style object will be implicitly created);
			* - using explicitly created font style object.
			*/
		
			// Saving the document as OOXML file...
			$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
			$objWriter->save('cavis-word-temp/' . $pendaftar->nama . '-' . $pendaftar->nim . '-' . date("Y-m-d h i sa") . '.docx');
		}
		///////////////////////////////
		//End function generateMsWord//
		///////////////////////////////

		$dateFrom = new DateTime( Input::get('from-date') );
		// $dateFrom->sub(new DateInterval('P1D'));
		$dateTo = new DateTime( Input::get('to-date') );
		// $dateTo->add(new DateInterval('P1D'));

		$pendaftars = Pendaftar::whereBetween('created_at', array($dateFrom, $dateTo))->get();
		foreach ($pendaftars as $pendaftar) {
			generateMsWord($pendaftar);
		}
		
		// $dirName = public_path() . "/cavis-word/";
		$dirName = public_path() . "/cavis-word-temp/";

		// $zipFileName = 'cavis-word.zip';
		$zipFileName = 'cavis-word-temp.zip';

		$zip = new ZipArchive;
		$result = $zip->open( $zipFileName, ZipArchive::CREATE );
		if ( $result === true )
		{
			foreach ( glob( $dirName . '/*') as $fileName )
			{
				$file = basename( $fileName );
				$zip->addFile( $fileName, $file );
			}
			$zip->close();
		}

		$headers = array(
			'Content-Type' => 'application/docx',
		);

		if(file_exists(public_path() . '/' . $zipFileName))
			return Response::download( public_path() . '/' . $zipFileName, 'cavis-word '.Input::get('from-date').'-'.Input::get('to-date').'.zip', $headers );
		else{
			//jika tidak ada file pada zip, redirect back
			return Redirect::back();
		}
	}
  
  /*public function photoexport(){
		     $dirName = public_path() . "/photo/";

            $zipFileName = 'myzip.zip';

            $zip = new ZipArchive;

            if ( $zip->open( public_path() . '/' . $zipFileName, ZipArchive::CREATE ) === true )
            {
                foreach ( glob( $dirName . '/*' ) as $fileName )
                {
                    $file = basename( $fileName );
                    $zip->addFile( $fileName, $file );
                }
			}
                $zip->close();

                $headers = array(
                    'Content-Type' => 'application/jpg',
                );

                return Response::download( public_path() . '/' . $zipFileName, $zipFileName, $headers );
	}
	*/
	
	public function hapus($id)
	{
		Pendaftar::find($id)->delete();
		return Redirect::back();
	}
}