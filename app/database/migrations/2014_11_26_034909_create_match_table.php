<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('matchs',function(Blueprint $table){
			$table->increments('id');
			$table->String('team1');
			$table->String('team2');
			$table->String('rate');
			$table->String('league');
			$table->String('result');
			$table->String('status');
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
		Schema::drop('matchs');
	}

}
