<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->index();
            $table->unsignedBigInteger('category_id')->index();
            $table->enum('type', ['DRAFT', 'PUBLISHED', 'UNPUBLISHED'])->default('DRAFT');
            $table->string('title');
            $table->string('content');
            $table->timestamps();

            $table->foreign('user_id')->on('users')->references('id');
            $table->foreign('category_id')->on('categories')->references('id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
}
