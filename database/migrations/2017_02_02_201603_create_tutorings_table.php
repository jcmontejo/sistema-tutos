<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTutoringsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tutorings', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('school_cycle');
			$table->string('campus');
			$table->date('date');
			$table->string('presentation', 800);
			$table->string('general_objective', 800);
			$table->string('specific_objetives', 800);
			$table->string('elaboration');
			$table->string('vobo');
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
		Schema::drop('tutorings');
	}

}
