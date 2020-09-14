<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('order_items', function (Blueprint $table) {
            $table->increments('id');
            
            $table->unsignedInteger('order_id');
            $table->foreign("order_id")->references("id")->on("orders")->onDelete("cascade"); //cascad是串連的意思，代表如何刪除的方式/set null 意思是把分類刪掉 資料便null
         
            $table->unsignedInteger('product_id');
            $table->foreign("product_id")->references("id")->on("products"); //cascad是串連的意思，代表如何刪除的方式/set null 意思是把分類刪掉 資料便null
            
            $table->integer('quantity');
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
        Schema::dropIfExists('order_items');

        Schema::table("order_items",function (Blueprint $table){
            $table->dropForeign(["order_id"]);

        });
    }
}
