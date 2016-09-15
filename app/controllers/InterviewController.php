<?php

class InterviewController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex($nim='')
	{
		$data['status'] = 'success';
		$data['count_shift_1'] = Interview::where('jam_interview', 'Shift 1 : 08.00 - 10.30')->count();
		$data['count_shift_2'] = Interview::where('jam_interview', 'Shift 2 : 11.30 - 14.30')->count();
		$data['count_shift_3'] = Interview::where('jam_interview', 'Shift 3 : 15.00 - 17.00')->count();

		return View::make('interview.index')->with('data', $data);
	}

	/**
	 * API - get cavis's name
	 */
	public function getName()
	{
		$nim = Input::get('nim');
		$cavis = DB::table('cavis')->where('nim', $nim)->first();
		if ($cavis == null) {
			$data['nama'] = "Nim tidak ditemukan";
			$data['shift'] = "";
		}
		else{
			$data['nama'] = $cavis->nama;
			if (DB::table('interviews')->where('cavis_nim', $nim)->first() != null) {
				$data['shift'] = DB::table('interviews')->where('cavis_nim', $nim)->first()->jam_interview;
			}
			else $data['shift'] = "";

		}
		return $data;
	}

	public function postSave()
	{
		$data = [];
		$nim = Input::get('nim');
		$jam_interview = Input::get('jam_interview');
		$cavis = Pendaftar::where('nim', $nim)->first();
		$count_target_shift_interview = Interview::where('jam_interview', $jam_interview)->count();
		if($cavis == null){
			$data['status'] = 'error';
			$data['message'] = 'Error, nim tidak ditemukan';
			return $data;
		}
		else if ($count_target_shift_interview >= 80) {
			$data['status'] = 'error';
			$data['message'] = 'Maaf, kapasitas pada '.$jam_interview.' sudah penuh. Silahkan Refresh Page untuk meng-update kapasitas yang tertulis.';
			return $data;
		}
		else{
			$interview = Interview::where('cavis_nim', $nim)->first();
			if($interview == null){
				$newInterview = new Interview();
				$newInterview->cavis_nim = $nim;
				$newInterview->jam_interview = $jam_interview;
				$newInterview->save();
			}
			else{
				$interview->jam_interview = $jam_interview;
				$interview->save();
			}
			
			$data['status'] = "success";
			$data['message'] = "Data sudah tersimpan. ".$cavis->nama." akan interview pada tanggal 23 September, ".$jam_interview;

			return $data;
		}
	}

	public function getListPeserta($jam_interview)
	{
		$data['cavis'] = DB::table('interviews')->join('cavis', 'cavis.nim', '=', 'interviews.cavis_nim')
				->where('jam_interview', $jam_interview)
				->orderBy('nim', 'asc')
				->get();
		$data['count'] = DB::table('interviews')->join('cavis', 'cavis.nim', '=', 'interviews.cavis_nim')
				->where('jam_interview', $jam_interview)
				->orderBy('nim', 'asc')
				->count();
		$data['jam_interview'] = $jam_interview;
		return View::make('interview.list')->with('data', $data);
	}


}
