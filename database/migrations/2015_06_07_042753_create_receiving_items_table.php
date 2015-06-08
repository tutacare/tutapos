<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReceivingItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('receiving_items', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('receiving_id');
			$table->integer('item_id');
			$table->decimal('cost_price',5, 2);
			$table->integer('quantity');
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
		Schema::drop('receiving_items');
	}

}
