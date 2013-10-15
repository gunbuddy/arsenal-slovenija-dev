<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class PivotElementMediaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('element_media', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('element_id');
			$table->integer('media_id');
			$table->integer('position');
			$table->integer('creator');
			$table->integer('updator');
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
		Schema::drop('element_media');
	}

}