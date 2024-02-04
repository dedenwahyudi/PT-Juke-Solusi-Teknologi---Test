<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->date('date_of_birth');
            $table->string('phone_number', 12);
            $table->string('email_address', 30);
            $table->string('province_address', 25);
            $table->string('city_address', 25);
            $table->string('street_address', 25);
            $table->string('zip_code', 10);
            $table->string('ktp_number', 16);
            $table->string('ktp_image')->nullable();
            $table->string('current_position_bank_account', 25);
            $table->string('bank_account_number', 25);
            $table->string('employee_position', 25);
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
        Schema::dropIfExists('employee');
    }
}
