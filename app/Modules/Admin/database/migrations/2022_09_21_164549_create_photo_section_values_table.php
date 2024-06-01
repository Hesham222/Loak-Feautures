<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhotoSectionValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photo_section_values', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('photo_section_id')->unsigned();
            $table->foreign('photo_section_id')->references('id')->on('photo_sections')->onDelete('cascade');
            $table->string('image')->nullable();
            $table->string('text')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('photo_section_values');
    }
}
