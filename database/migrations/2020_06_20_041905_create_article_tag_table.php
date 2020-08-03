<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_tag', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('article_id')->unsigned();
            $table->integer('tag_id')->unsigned();

            // user_id 外鍵
            $table->foreign('article_id')
                ->references('id')->on('articles')
                ->onDelete('cascade');

            // animal_id 外鍵
            $table->foreign('tag_id')
                ->references('id')->on('tags')
                ->onDelete('cascade');

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
        Schema::dropIfExists('article_tag');

        Schema::table("article_tag",function (Blueprint $table){
            $table->dropForeign(["article_id"]);

        });

        Schema::table("article_tag",function (Blueprint $table){
            $table->dropForeign(["tag_id"]);

        });

    }
}
