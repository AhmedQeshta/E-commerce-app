<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSitesettingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sitesetting', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('phone_one')->nullable()->default('0592157001');
            $table->string('phone_two')->nullable()->default('0592157001');
            $table->string('email')->nullable()->default('ahmedqeshta1999@gmail.com');
            $table->string('company_name')->nullable()->default('UC-Company');
            $table->string('company_address')->nullable()->default('Palestine - Gaza Strip - Al-Remail ST');
            $table->string('facebook')->nullable()->default('https://www.facebook.com/A7medQeshta/');
            $table->string('youtube')->nullable()->default('https://www.youtube.com/channel/UCg2XzdIwr6JoC8FjR3GV_nw?view_as=subscriber');
            $table->string('instagram')->nullable()->default('https://www.paypal.com/paypalme/A7medQeshta');
            $table->string('twitter')->nullable()->default('https://www.paypal.com/paypalme/A7medQeshta');
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
        Schema::dropIfExists('sitesetting');
    }
}
