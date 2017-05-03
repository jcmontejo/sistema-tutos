<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('items', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('theme');
			$table->string('activity');
			$table->string('objective');
			$table->string('resources');
			$table->string('schedule');
			$table->string('evaluation_and_follow');
			$table->integer('general_id')->unsigned()->foreign('general_id')->references('id')->on('generals');
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
		Schema::drop('items');
	}

}
