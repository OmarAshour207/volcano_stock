<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubcategoryTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subcategory_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',191);
            $table->unsignedInteger('subcategory_id');
            $table->string('locale',191)->index();
            $table->unique(['subcategory_id','locale']);
            $table->foreign('subcategory_id')->references('id')->on('subcategories')->onDelete('cascade');

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
        Schema::dropIfExists('subcategory_translations');
    }
}
