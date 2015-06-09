<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaleItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sale_items', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('sale_id');
			$table->integer('item_id');
			$table->decimal('cost_price',5, 2);
			$table->decimal('selling_price',5, 2);
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
		Schema::drop('sale_items');
	}

}
