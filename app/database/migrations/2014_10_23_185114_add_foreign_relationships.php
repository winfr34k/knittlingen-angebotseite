<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignRelationships extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('companies', function($table)
		{
		    $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
		});
		Schema::table('offers', function($table)
		{
		    $table->foreign('company_id')->references('id')->on('companies');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('companies', function($table)
		{
		   $table->dropForeign('companies_user_id_foreign');
		});
		Schema::table('offers', function($table)
		{
			$table->dropForeign('offers_company_id_foreign');
		});
	}

}
