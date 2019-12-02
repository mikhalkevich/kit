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
            $table->bigIncrements('id');
			$table->string('name');
			$table->string('price');
			$table->text('body');
			$table->string('small_body');
			$table->enum('showhide',['0','1'])->default('1');
			$table->integer('category_id');
			$table->string('picture');
			$table->integer('user_id');
			$table->string('status');
            $table->timestamps();
        });
    }

    /**
name, price, body, small_body, showhide, category_id, picture, user_id, status
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
