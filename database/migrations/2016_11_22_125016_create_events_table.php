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
            $table->text('name')->nullable();
            $table->string('origin_id', 50)->nullable();
            $table->text('info_url')->nullable();
            $table->text('description')->nullable();
            $table->text('short_description')->nullable();
            $table->timestamp('date_published')->nullable();
            $table->text('headline')->nullable();
            $table->text('secondary_headline')->nullable();
            $table->text('provider')->nullable();
            $table->tinyInteger('event_status', false, true)->nullable();
            $table->text('location_extra_info')->nullable();
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
            $table->unsignedTinyInteger('publication_status')->nullable();
            $table->integer('image_id')->unsigned()->nullable();
            $table->boolean('deleted')->default(false);
            $table->string('image')->nullable();

            $table->timestamps();

            $table->primary('id');
            $table->foreign('image_id')
                ->references('id')
                ->on('images');

            $table->foreign('super_event_id')
                ->references('id')
                ->on('events')
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
