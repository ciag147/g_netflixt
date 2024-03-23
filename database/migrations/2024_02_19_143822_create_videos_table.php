<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('actor');
            $table->longText('description');
            $table->text('director');
            $table->string('href', 50);
            $table->boolean('isActive')->default(true);
            $table->longText('poster');
            $table->integer('price');
            $table->integer('share');
            $table->text('title');
            $table->integer('view');
            $table->bigInteger('categoryId');
            $table->timestamp('createdAt');
            $table->timestamp('updatedAt')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('videos');
    }
}
