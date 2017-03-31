<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKeywordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keywords', function (Blueprint $table) {
            $table->string('id', 50);
            $table->string('name');
            $table->text('name_tr')->nullable();
            $table->string('origin_id', 50)->nullable();
            $table->boolean('aggregate')->default(false);
            $table->string('data_source_id', 50)->nullable();
            $table->integer('last_modified_by_id')->nullable()->unsigned();
            $table->integer('image_id')->nullable()->unsigned();

            $table->timestamps();

            $table->primary('id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('keywords');
    }
}
