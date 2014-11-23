<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('categories', function(Blueprint $table)
		{
			$table->engine('InnoDB');
			$table->increments('id');
			$table->string('name');
			$table->timestamps();
		});

		//Changing the offers table so we get to have a foreign key relation ship
		Schema::table('offers', function($table)
		{
			$table->integer('category_id')->unsigned()->after('company_id')->default(1);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('offers', function($table)
		{
			$table->dropColumn('category_id');
		});

		Schema::drop('categories');
	}

}
