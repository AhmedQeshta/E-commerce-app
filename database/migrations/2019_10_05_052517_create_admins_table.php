<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('phone')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->unsignedInteger('type')->nullable();
            $table->unsignedInteger('category')->default(0)->nullable();
            $table->unsignedInteger('product')->default(0)->nullable();
            $table->unsignedInteger('blog')->default(0)->nullable();
            $table->unsignedInteger('order')->default(0)->nullable();
            $table->unsignedInteger('other')->default(0)->nullable();
            $table->unsignedInteger('report')->default(0)->nullable();
            $table->unsignedInteger('return')->default(0)->nullable();
            $table->unsignedInteger('contact')->default(0)->nullable();
            $table->unsignedInteger('comment')->default(0)->nullable();
            $table->unsignedInteger('setting')->default(0)->nullable();
            $table->unsignedInteger('stock')->default(0)->nullable();
            $table->unsignedInteger('role')->default(0)->nullable();
            $table->unsignedInteger('coupon')->default(0)->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('admins');
    }
}
