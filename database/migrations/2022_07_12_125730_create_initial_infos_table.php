<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInitialInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('initial_infos', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('family')->nullable();
            $table->string('province')->nullable();
            $table->string('image')->nullable();
            $table->string('fatherName')->nullable();
            $table->string('birthDay')->nullable();
            $table->string('birthLocation')->nullable();
            $table->integer('age')->nullable();
            $table->integer('decade')->nullable();
            $table->string('religious')->nullable();
            $table->boolean('maritalStatus')->nullable();
            $table->boolean('special')->nullable();
            $table->string('category')->nullable();
            $table->string('categoryTitle')->nullable();
            $table->string('specialTitle')->nullable();
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
        Schema::dropIfExists('initial_infos');
    }
}
