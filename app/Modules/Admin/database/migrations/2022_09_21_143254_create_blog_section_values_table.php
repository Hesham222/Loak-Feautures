<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogSectionValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_section_values', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('blog_section_id')->unsigned();
            $table->foreign('blog_section_id')->references('id')->on('blog_sections')->onDelete('cascade');
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
        Schema::dropIfExists('blog_section_values');
    }
}
