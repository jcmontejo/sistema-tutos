<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDirectorsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('directors', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('father_last_name');
			$table->string('mother_last_name');
			$table->string('email')->unique()->required();
			$table->string('address');
			$table->string('phone');
			$table->string('academic_title');
			$table->string('password');
			$table->integer('user_id')->unsigned()->foreign('user_id')->references('id')->on('users');
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
		Schema::drop('directors');
	}

}
