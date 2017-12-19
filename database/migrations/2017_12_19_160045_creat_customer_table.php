<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('customer_code',5)->unique();
            $table->string('customer_name');
            $table->string('customer_owner');
            $table->char('customer_phone',10);
            $table->char('customer_fax',10);
            $table->string('customer_ZipCode');
            $table->string('customer_email')->unique();
            $table->string('customer_liaison');
            $table->string('customer_address');
            $table->string('customer_GUInumber');

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
        Schema::dropIfExists('customers');
    }
}
