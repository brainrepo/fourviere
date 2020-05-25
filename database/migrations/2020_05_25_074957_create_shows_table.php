<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shows', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('title');
            $table->string('subtitle');
            $table->text('summary');
            $table->text('language');
            $table->text('category');
            $table->json('itunes_category');
            $table->text('copyright');
            $table->string('owner');
            $table->string('email');
            $table->string('author');
            $table->boolean('explicit');

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
        Schema::dropIfExists('shows');
    }
}
