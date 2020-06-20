<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreataPicturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pictures', function (Blueprint $table) {
            $table->increments('id');
            $table->string('picture');
            $table->integer('product_id')->unsigned();
         
            $table->foreign("product_id")->references("id")->on("products")->onDelete("cascade"); //cascad是串連的意思，代表如何刪除的方式/set null 意思是把分類刪掉 資料便null
            
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
      
        Schema::table("pictures",function (Blueprint $table){
            $table->dropForeign(["product_id"]);

        });

        Schema::dropIfExists('pictures');
    }
}
