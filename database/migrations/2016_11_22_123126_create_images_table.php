<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image', 100)->nullable();
            $table->string('url')->nullable();
            $table->string('cropping')->nullable();
            $table->integer('created_by_id')->unsigned()->nullable();
            $table->integer('last_modified_by_id')->unsigned()->nullable();
            $table->integer('publisher_id')->unsigned()->nullable();
            $table->string('name');
            $table->integer('license_id')->unsigned();
            $table->timestamps();

            $table->foreign('license_id')
                ->references('id')
                ->on('licenses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('images');
    }
}
