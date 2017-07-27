<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateAdvertisementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertisements', function (Blueprint $table) {
            $table->increments('id');

            $table->uuid('uuid');
            $table->string('title');
            $table->string('description');
            $table->string('tags');
            $table->float('price');
            $table->enum('price_unit', ['USD', 'BRL']);
            $table->dateTime('published_at')->nullable();

            $table->timestamps();
        });

        DB::statement('ALTER TABLE advertisements ADD FULLTEXT search(title, description, tags)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('advertisements');
    }
}
