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
            $table->foreign('item_kit_id')->references('id')->on('item_kits')->onDelete('restrict');
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
        Schema::drop('item_kit_items');
    }
}
