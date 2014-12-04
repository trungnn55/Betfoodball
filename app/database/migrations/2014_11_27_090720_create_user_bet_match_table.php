<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserBetMatchTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('userbetmatch',function(Blueprint $table){
			$table->increments('id');
			$table->integer('idmatch');
			$table->String('betname');
			$table->String('teampick');
			$table->integer('betmoney');
			$table->integer('money');
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
		//
		Schema::drop('userbetmatch');
	}

}
