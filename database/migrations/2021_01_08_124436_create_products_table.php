<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
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
            $table->string('productid')->unique();
            $table->string('name');
            $table->string('amount');
            $table->string('menu');
            $table->string('category');
            $table->string('discount')->default('null');
            $table->longText('description');
            $table->string('type');
            $table->string('status')->default('avaliable');
            $table->string('image');
            $table->string('extra')->default('null');
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
}
