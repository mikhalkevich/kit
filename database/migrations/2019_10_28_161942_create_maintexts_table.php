<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaintextsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maintexts', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->string('name');
			$table->string('small_body');
			$table->text('body');
			$table->string('url');
			$table->enum('showhide',['show','hide'])->default('show');
            $table->timestamps(); //created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('maintexts');
    }
}
