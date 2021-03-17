<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            
            $table->string('name');
            $table->longText('description')->nullable();
            $table->string('image')->nullable()->default('assets/img/no-image.png');
            $table->enum('post_type', ['post', 'page'])->default('post');
            $table->string('mata_key')->nullable();
            $table->string('mata_description')->nullable();
            
            $table->integer('user_id')->unsigned();
            
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
        Schema::dropIfExists('posts');
    }
}
