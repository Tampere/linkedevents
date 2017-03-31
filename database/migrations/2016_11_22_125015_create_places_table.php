<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('places', function (Blueprint $table) {
            $table->string('id', 50);
            $table->string('name')->nullable();
            $table->text('name_tr')->nullable();
            $table->integer('origin_id')->unsigned()->nullable();
            $table->string('info_url', 200)->nullable();
            $table->text('info_url_tr')->nullable();
            $table->text('description')->nullable();
            $table->text('description_tr')->nullable();
            $table->string('position')->nullable();
            $table->string('email', 254)->nullable();
            $table->string('telephone', 128)->nullable();
            $table->text('telephone_tr')->nullable();
            $table->string('contact_type')->nullable();
            $table->string('street_address')->nullable();
            $table->text('street_address_tr')->nullable();
            $table->string('address_locality')->nullable();
            $table->text('address_locality_tr')->nullable();
            $table->string('address_region')->nullable();
            $table->string('postal_code', 128)->nullable();
            $table->string('post_office_box_num', 128)->nullable();
            $table->string('address_county', 2)->nullable();
            $table->integer('created_by_id')->unsigned()->nullable();
            $table->string('data_source_id', 100)->nullable();
            $table->integer('last_modified_by_id')->unsigned()->nullable();
            $table->string('parent_id', 50)->nullable();
            $table->string('publisher_id')->nullable();
            $table->integer('image_id')->unsigned()->nullable();
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
        Schema::dropIfExists('places');
    }
}
