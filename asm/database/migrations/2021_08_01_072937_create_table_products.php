<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cate_id');
            // $table->unsignedBigInteger('brand_id');
            $table->string('prod_name');
            $table->integer('price')->default(0);
            $table->string('image');
            $table->text('detail');
            $table->integer('sale_percent')->default(0);
            $table->timestamps();
            $table->foreign('cate_id')->references('id')->on('categories');
            // $table->foreign('brand_id')->references('id')->on('brands');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Products');
    }
}