<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
Schema::defaultStringLength(191);
class CreatePhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->string("title"); 
            $table->text("description")->nullable();
            $table->date('date')->nullable();
            $table->binary("file");
            $table->string("resolution")->nullable();
            $table->string("height"); 
            $table->string("width"); 
            $table->foreignId("group_id")->nullable(); 
            $table->foreignId("user_id")->nullable();
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
        Schema::dropIfExists('photos');
    }
}
