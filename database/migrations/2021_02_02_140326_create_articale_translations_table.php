<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticaleTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articale_translations', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('articale_id')->unsigned()->nullable();
            $table->foreign('articale_id')->references('id')->on('articales')->onDelete('cascade')->onUpdate('cascade');
            $table->string('lang');
            $table->string('name');
            $table->string('content');
            $table->softDeletes();
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
        Schema::dropIfExists('articale_translations');
    }
}
