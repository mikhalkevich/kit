<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->string('name');
			$table->string('email');
			$table->string('phone');
			$table->text('body');
			$table->string('status')->nullable();
			$table->integer('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
 
name
email
phone
body
status
user_id
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
