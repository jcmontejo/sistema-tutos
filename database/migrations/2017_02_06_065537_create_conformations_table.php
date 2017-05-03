<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConformationsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('conformations', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('body', 3000);
			$table->integer('director_id')->unsigned()->foreign('director_id')->references('id')->on('directors');
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
		Schema::drop('conformations');
	}

}
