<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCavisTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cavis', function($table)
		{
		    $table->increments('id');
		    $table->text('nim');
		    $table->text('nama');
		    $table->text('gender');
		    $table->text('fakultas');
		    $table->text('jurusan');
		    $table->text('tempat_lahir');
		    $table->dateTime('ttl');
		    $table->text('nomor_telfon');
		    $table->text('idline');
		    $table->text('email');
		    $table->decimal('ipk', 5, 2);
		    $table->text('alamat');
		    $table->text('pengalaman_organisasi');
		    $table->text('penghargaan');
		    $table->timestamps();
		});

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('cavis');
	}

}
