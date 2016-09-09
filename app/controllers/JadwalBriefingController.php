<?php 
class JadwalBriefingController extends Controller {
	public function create()
	{
		return View::make('jadwalBriefing.create');
	}
	public function update()
	{
		return View::make('jadwalBriefing.update');
	}
}