<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhotoTypeOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photo_type_options', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('section_type_id')->unsigned();
            $table->foreign('section_type_id')->references('id')->on('photo_section_types')->onDelete('cascade');
            $table->string('type');
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
        Schema::dropIfExists('photo_type_options');
    }
}
