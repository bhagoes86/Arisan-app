<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TbNamaanggota extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('namaanggota', function($t) {
			$t->increments('No');
			$t->string('NamaAnggota', 20);
			$t->string('Alamat', 50);
			$t->string('StatusBayar', 20);
			$t->string('KocokArisan', 20);
			$t->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('namaanggota');
	}

}
