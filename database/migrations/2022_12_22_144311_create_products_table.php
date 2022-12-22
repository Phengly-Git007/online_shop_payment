<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->string('name');
            $table->string('slug');
            $table->string('image');
            $table->mediumText('short_description');
            $table->longText('description');
            $table->string('cost_of_good');
            $table->string('selling_price');
            $table->string('quantity');
            $table->string('tax');
            $table->boolean('status')->default('0');
            $table->boolean('trending')->default('0');
            $table->string('meta_title');
            $table->string('meta_keyword');
            $table->string('meta_description');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
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
        Schema::dropIfExists('products');
    }
};
