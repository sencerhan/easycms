<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->integer("language_id")->nullable();
            $table->string("meta_title")->nullable();
            $table->string("meta_keywords")->nullable();
            $table->string("meta_description")->nullable();
            $table->string("facebook")->nullable();
            $table->string("twitter")->nullable();
            $table->string("instagram")->nullable();
            $table->string("google")->nullable();
            $table->string("whatsapp")->nullable();
            $table->string("address")->nullable();
            $table->string("phone")->nullable();
            $table->string("gsm")->nullable();
            $table->string("fax")->nullable();
            $table->string("email")->nullable();
            $table->text("footer_left_content")->nullable();
            $table->text("footer_center_content")->nullable();
            $table->string("footer_left_title")->nullable();
            $table->string("footer_center_title")->nullable();
            $table->string("footer_menu_title")->nullable();
            $table->string("site_logo")->nullable();
            $table->string("favicon")->nullable();
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
        Schema::dropIfExists('settings');
    }
}