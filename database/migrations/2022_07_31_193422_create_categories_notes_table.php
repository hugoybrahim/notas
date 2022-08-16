<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories_notes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_notes');
            $table->unsignedBigInteger('id_categories');
            $table->foreign('id_categories')->references('id')->on('categories');
            $table->foreign('id_notes')->references('id')->on('notes');
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
        Schema::dropIfExists('categories_notes');
    }
};
