<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOffersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('offers', function(Blueprint $table)
		{
			$table->engine('InnoDB');
			$table->increments('id');
			$table->string('name');
			$table->text('description');
			$table->dateTime('startDate')->default(date('Y-m-d H:i:s'));
			$table->dateTime('endDate')->default(date('Y-m-d H:i:s'));
			$table->integer('company_id')->unsigned();
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
		Schema::drop('offers');
	}

}
