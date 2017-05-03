<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeneralsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('generals', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('students_attended');
			$table->string('school_cycle');
			$table->string('campus');
			$table->string('turn');
			$table->date('date');
			$table->string('general_objective');
			$table->string('elaboration');
			$table->string('vobo');
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
		Schema::drop('generals');
	}

}
