<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('customers', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 100);
			$table->string('email', 30);
			$table->string('phone_number', 20);
			$table->string('avatar', 255)->default('no-foto.png');
			$table->string('address', 255);
			$table->string('city', 20);
			$table->string('state', 30);
			$table->string('zip', 10);
			$table->string('comment', 255);
			$table->string('company_name', 100);
			$table->string('account', 20);
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
		Schema::drop('customers');
	}

}
