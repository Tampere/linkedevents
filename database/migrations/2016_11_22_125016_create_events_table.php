<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->string('id', 50);
            $table->string('name');
            $table->json('name_tr')->nullable();
            $table->string('origin_id', 50)->nullable();
            $table->string('info_url', 200)->nullable();
            $table->json('info_url_tr')->nullable();
            $table->text('description')->nullable();
            $table->json('description_tr')->nullable();
            $table->text('short_description')->nullable();
            $table->json('short_description_tr')->nullable();
            $table->timestamp('date_published')->nullable();
            $table->string('headline')->nullable();
            $table->json('headline_tr')->nullable();
            $table->string('secondary_headline')->nullable();
            $table->json('secondary_headline_tr')->nullable();
            $table->string('provider')->nullable();
            $table->json('provider_tr')->nullable();
            $table->tinyInteger('event_status', false, true)->nullable();
            $table->string('location_extra_info')->nullable();
            $table->json('location_extra_info_tr')->nullable();
            $table->timestamp('start_time')->nullable();
            $table->timestamp('end_time')->nullable();
            $table->boolean('has_start_time')->default(true);
            $table->boolean('has_end_time')->default(true);
            $table->boolean('is_recurring_super')->default(false);
            $table->integer('created_by_id')->unsigned()->nullable();
            $table->string('data_source_id', 100)->nullable();
            $table->integer('last_modified_by_id')->nullable();
            $table->string('publisher_id', 50)->nullable();
            $table->string('super_event_id', 50)->nullable();
            $table->string('place_id', 50);
            $table->unsignedTinyInteger('publication_status')->nullable();
            $table->integer('image_id')->unsigned()->nullable();
            $table->boolean('deleted')->default(false);
            $table->string('image')->nullable();
            $table->integer('offer_id')->unsigned()->nullable();

            $table->timestamps();

            $table->primary('id');
            $table->foreign('image_id')
                ->references('id')
                ->on('images');

            $table->foreign('super_event_id')
                ->references('id')
                ->on('events')
                ->onDelete('cascade');

            $table->foreign('place_id')
                ->references('id')
                ->on('places')
                ->onDelete('cascade');

            $table->foreign('offer_id')
                ->references('id')
                ->on('offers')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
