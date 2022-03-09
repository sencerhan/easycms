<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePageDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page_details', function (Blueprint $table) {
            $table->id();
            $table->integer("page_id");
            $table->integer("language_id");
            $table->string("slug")->nullable();
            $table->string("title")->nullable();
            $table->string("meta_title")->nullable();
            $table->string("meta_keywords")->nullable();
            $table->string("meta_description")->nullable();
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
        Schema::dropIfExists('page_details');
    }
}
