<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seo', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('meta_title')->nullable()->default('UC-Title');
            $table->string('meta_author')->nullable()->default('Ahmed Qeshta');
            $table->string('meta_tag')->nullable()->default('html,css,js,laravel,web,developer');
            $table->text('meta_description')->nullable()->default('html css js laravel web developer');
            $table->text('google_analytics')->nullable()->default('google_analytics');
            $table->text('bing_analytics')->nullable()->default('bing_analytics');
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
        Schema::dropIfExists('seo');
    }
}
