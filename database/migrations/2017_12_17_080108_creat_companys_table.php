<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatCompanysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company_code',5)->unique();
            $table->string('company_name');
            $table->string('company_owner');
            $table->char('company_phone',10);
            $table->char('company_fax',10);
            $table->string('company_ZipCode');
            $table->string('company_email')->unique();
            $table->string('company_url');
            $table->string('company_address');
            $table->string('company_GUInumber');

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
        Schema::dropIfExists('companys');
    }
}
