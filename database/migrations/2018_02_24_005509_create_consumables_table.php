<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsumablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consumables', function (Blueprint $table) {
            // internal
            $table->increments('id');

            // required
            $table->string('name');
            $table->string('category_id');
            $table->integer('quantity');
            $table->integer('minimum_quantity');

            // optional
            $table->string('item_number')->nullable();
            $table->string('catalog_number')->nullable();
            $table->string('custom_number')->nullable();
            $table->string('location')->nullable();
            $table->float('price')->nullable();
            $table->string('image_id')->nullable();
            $table->text('notes')->nullable();

            // internal
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
        Schema::dropIfExists('consumables');
    }
}
