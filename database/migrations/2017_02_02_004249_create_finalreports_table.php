<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFinalreportsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('finalreports', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('students_attended');
			$table->string('school_cycle');
			$table->string('campus');
			$table->string('turn');
			$table->date('date');
			$table->string('guidance', 800);
			$table->string('presentation', 1500);
			$table->string('activities_performed', 1500);
			$table->string('results', 1500);
			$table->string('evaluation', 1500);
			$table->string('suggestions', 1500);
			$table->string('elaboration', 800);
			$table->string('vobo', 800);
			$table->integer('directors_id')->unsigned()->foreign('director_id')->references('id')->on('directors');
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
		Schema::drop('finalreports');
	}

}
