<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemKitItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_kit_items', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('item_kit_id')->unsigned();
            $table->foreign('item_kit_id')->references('id')->on('items')->onDelete('restrict');
            $table->integer('item_id')->unsigned();
            $table->foreign('item_id')->references('id')->on('items')->onDelete('restrict');
            $table->decimal('cost_price', 15, 2);
            $table->decimal('selling_price', 15, 2);
            $table->integer('quantity');
            $table->decimal('total_cost_price', 15, 2);
            $table->decimal('total_selling_price', 15, 2);
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
        Schema::drop('item_kit_items');
    }
}
