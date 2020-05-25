<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEpisodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('episodes', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('title');
            $table->string('permalink');
            $table->enum('visibility', ['PUBLIC', 'PRIVATE', 'LIMITED']);
            $table->text('description');
            $table->boolean('explicit');
            $table->boolean('downloadable');
            $table->dateTime('publish_date');

            $table->uuid('show_id');
            $table->foreign('show_id')->references('id')->on('shows')->onDelete('cascade');

            $table->primary('id');

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
        Schema::dropIfExists('episodes');
    }
}
