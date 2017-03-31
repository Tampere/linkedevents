<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('price')->nullable();
            $table->text('price_tr')->nullable();
            $table->string('info_url', 200)->nullable();
            $table->text('info_url_tr')->nullable();
            $table->text('description')->nullable();
            $table->text('description_tr')->nullable();
            $table->boolean('is_free')->default(true);
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
        Schema::dropIfExists('offers');
    }
}
