<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndividualsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('individuals', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('students_attended');
			$table->string('semester');
			$table->string('turn');
			$table->string('campus');
			$table->string('docent');
			$table->date('date');
			$table->string('problematic', 3000);
			$table->string('objective_general', 3000);
			$table->string('elaboration', 2000);
			$table->string('vobo', 2000);
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
		Schema::drop('individuals');
	}

}
