<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectSectionValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_section_values', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('project_section_id')->unsigned();
            $table->foreign('project_section_id')->references('id')->on('project_sections')->onDelete('cascade');
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
        Schema::dropIfExists('project_section_values');
    }
}
