<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTutorialreportsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tutorialreports', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('students_attended');
			$table->string('campus');
			$table->string('semester');
			$table->string('turn');
			$table->string('docent');
			$table->date('date');
			$table->string('problematic', 2000);
			$table->string('general_objective', 2000);
			$table->string('students', 2000);
			$table->string('grade_and_group');
			$table->string('activities', 2000);
			$table->string('results', 2000);
			$table->string('observations', 2000);
			$table->string('suggestions_and_proposals', 2000);
			$table->string('vobo', 1000);
			$table->integer('directors_id')->unsigned()->foreign('directors_id')->references('id')->on('directors');
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
		Schema::drop('tutorialreports');
	}

}
