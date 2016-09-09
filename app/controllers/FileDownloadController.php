<?php 
class FileDownloadController extends Controller {
	public function index()
	{
		return View::make('filedownload.index');
	}
}