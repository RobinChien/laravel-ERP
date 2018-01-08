<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('product_code',10)->unique();
            $table->string('product_name');
            $table->integer('common_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->string('product_price');
            $table->boolean('product_status');
            $table->integer('product_or_item'); //成品=>0 半成品=>1 原料=>2
            $table->integer('manufacturer_id')->unsigned();
            $table->foreign('common_id')->references('id')->on('common_codes')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('product_categories')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('manufacturer_id')->references('id')->on('manufacturers')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('bom', function (Blueprint $table){
            $table->integer('parent_id')->unsigned();
            $table->integer('child_id')->unsigned();
            $table->integer('qty');
            $table->foreign('parent_id')->references('id')->on('products')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('child_id')->references('id')->on('products')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->primary(['parent_id', 'child_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bom');
        Schema::dropIfExists('products');
    }
}
