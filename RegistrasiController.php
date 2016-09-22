<?php 
class RegistrasiController extends BaseController {
	public function index()
	{
			return View::make('registrasi.index'); //ngereturn file html yg ada di folder add, update.php
	}

	/**
	 * [success description]
	 * @return [View] [jika sukses, menuju success.blade.php; selain itu, kembali ke form awal]
	 */
	public function success()
	{
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
			//$section->addTextBreak();
			
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
				'TTL 				: ' . $pendaftar->tempat_lahir . ', ' . $pendaftar->ttl
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

			// Adding Text element with font customized using explicitly created font style object...
			$fontStyle = new \PhpOffice\PhpWord\Style\Font();
			$fontStyle->setBold(true);
			$fontStyle->setName('Arial');
			$fontStyle->setSize(12);
			$myTextElement = $section->addText(
			    htmlspecialchars('Pilihan Divisi (diisi setelah Briefing Calon Nindya 9G - 23 September 2016)')
			);
			$myTextElement->setFontStyle($fontStyle);

			// $section->addText( 'Pilihan Divisi (diisi setelah Briefing Calon Nindya 9G - 23 September 2016)' );

			$section->addCheckBox('Learning', 'Mentoring');
			$section->addCheckBox('Learning', 'People Development');
			$section->addCheckBox('Learning', 'Competition');
		
			/*
			* Note: it's possible to customize font style of the Text element you add in three ways:
			* - inline;
			* - using named font style (new font style object will be implicitly created);
			* - using explicitly created font style object.
			*/
		
			// Saving the document as OOXML file...
			$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
			$objWriter->save('cavis-word/' . $pendaftar->nama . '-' . $pendaftar->nim . '-' . date("Y-m-d h i sa") . '.docx');
		}
		///////////////////////////////
		//End function generateMsWord//
		///////////////////////////////
		
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
				return Redirect::back()->withErrors($validator)->withInput(); // klo false balik ke form create
			}
			else 
			{				
				$pendaftar = new Pendaftar();
				// $pendaftar ->id = Input::get('id');
				$pendaftar ->nim = Input::get('nim');
				$pendaftar ->nama = Input::get('nama');
				$pendaftar ->gender = Input::get('gender');
				$pendaftar ->fakultas = Input::get('fakultas');
				$pendaftar ->jurusan = Input::get('jurusan');
				$pendaftar ->tempat_lahir = Input::get('tempat_lahir');
				$pendaftar ->ttl = Input::get('ttl');
				$pendaftar ->nomor_telfon = Input::get('nomor_telfon');
				$pendaftar ->idline = Input::get('idline');
				$pendaftar ->email = Input::get('email');
				$pendaftar ->ipk = Input::get('ipk');
				$pendaftar ->alamat = Input::get('alamat');
				$pendaftar ->pengalaman_organisasi = Input::get('pengalaman_organisasi');
				$pendaftar ->penghargaan = Input::get('penghargaan');
				
				// $pendaftar ->image = Input::file('image');				
				// Saving Image
				// $tamp = Input::get('id');
				// $file = Input::file('image');
				// $picturename = $file->getClientOriginalName();
				// // $generatpic = rand(1, 255).$picturename;
				// $generatpic = Input::get('nama') . "-" . Input::get('nim') . "-" . rand(10001, 99999) . "." . $file->getClientOriginalExtension();
				// $picturesize = $file->getSize();
				// $pictureext = $file->getClientOriginalExtension();
				// $fullpath = $file->move('photo/', $generatpic);
				// $realpath = str_replace('\\','/', $fullpath);
				
				// $pendaftar ->clientname = $picturename;
				// $pendaftar ->fullpath = $realpath;

				/*$filename  = time() . '.' . $image->getClientOriginalExtension();
				Image::make($image->getRealPath())->resize(468, 249)->save('/img/products/'.$filename);
				$pendaftar ->image = 'img/products/'.$filename;*/

				//generateMsWord( $pendaftar );

				$pendaftar ->save();

		        /*function displayimage()
		        {
					$database = "registrasicavis";
		            $con=mysqli_connect('localhost','root','');
		            mysqli_select_db($con, $database);
		            $qry='Select * from image';
		            $result=mysqli_query($con, $qry);
		            while($row = mysqli_fetch_array($result))
		            {
		                echo '<img height="200" width="180" src="data:image;base64,'.$row[2].' "> ';
		            }
		            mysqli_close($con);   
		        }*/
					//Session::flash('Message', 'Item berhasil di simpen');
			}
		
		return View::make('registrasi.success');
	}

	public function successTest()
	{
		return View::make('registrasi.success');
	}
	
	public function download(){
        //PDF file is stored under project/public/download/info.pdf
        // $file="C:\xampp\htdocs\Nindya-Registration\form.docx";
        // return Response::download($file);  //PDF file is stored under project/public/download/info.pdf
		// $file= app_path(). "/public/form.pdf";
		$file= "Modul-BSLC.pdf";
        $headers = array(
              'Content-Type: application/pdf'
            );
        return Response::download($file, 'Modul-BSLC.pdf', $headers);
	}
}