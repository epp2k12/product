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
            $table->string('prduct_code',20)->nullable()->unique(); 
            $table->string('name',50)->unique();
            $table->string('category',20)->default('no-category'); 
            $table->string('country',20)->default('special'); 
            $table->string('product_image')->default('product.jpeg'); 
            $table->text('description'); 
            $table->decimal('price', 8, 2)->default(0.00);
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
