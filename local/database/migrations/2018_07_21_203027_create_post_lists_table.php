<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_lists', function (Blueprint $table) {
      
            $table->increments('id');
            $table->string('title');
            $table->longText('content');
            $table->longText('quotes_content');
            $table->string('author_id');
            $table->string('post_category_id');
            $table->string('status');
            $table->string('image_avatar');
            $table->string('view');
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
        Schema::dropIfExists('post_lists');
    }
}
