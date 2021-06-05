<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('full_text');
           // $table->unsignedBigInteger('category_id')->nullable();
           //$table->foreign('category_id')->references('id')->on('categories');
           /**
            * laravel release new foreignid key syntax
            * https://laravel.com/docs/8.x/migrations#foreign-key-constraints
            */
           $table->foreignId('Category_id')->constrained(); // new foreign key constrain. 

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
        Schema::dropIfExists('articles');
    }
}
