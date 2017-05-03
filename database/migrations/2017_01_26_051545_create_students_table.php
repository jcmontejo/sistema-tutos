<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('students', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('father_last_name');
			$table->string('mother_last_name');
			$table->string('enrollment');
			$table->string('email')->unique()->required();	
			$table->string('grade');
			$table->string('group');
			$table->string('turn');
			$table->string('address');
			$table->string('phone');
			$table->string('emergency_number');
			$table->string('state');
			$table->string('municipality');
			$table->string('password');
			$table->integer('user_id')->unsigned()->foreign('user_id')->references('id')->on('users');
			$table->integer('tutor_id')->unsigned()->foreign('tutor_id')->references('id')->on('tutors');
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
		Schema::drop('students');
	}

}
