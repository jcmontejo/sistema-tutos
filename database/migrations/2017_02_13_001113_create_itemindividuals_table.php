<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemindividualsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('itemindividuals', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('activities',3000);
			$table->string('date',1000);
			$table->string('resources',3000);
			$table->string('evidence',2000);
			$table->integer('individual_id')->unsigned()->foreign('individual_id')->references('id')->on('individuals');
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
		Schema::drop('itemindividuals');
	}

}
