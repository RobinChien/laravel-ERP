<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatManufacturerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manufacturers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('manufacturer_code',5)->unique();
            $table->string('manufacturer_name');
            $table->string('manufacturer_owner');
            $table->char('manufacturer_phone',10);
            $table->char('manufacturer_fax',10);
            $table->string('manufacturer_ZipCode');
            $table->string('manufacturer_email')->unique();
            $table->string('manufacturer_liaison');
            $table->string('manufacturer_address');
            $table->string('manufacturer_GUInumber');

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
        Schema::dropIfExists('manufacturers');
    }
}
