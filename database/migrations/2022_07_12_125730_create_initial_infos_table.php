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
            $table->string('fatherName')->nullable();
            $table->string('birthDay')->nullable();
            $table->string('birthLocation')->nullable();
            $table->integer('age')->nullable();
            $table->integer('decade')->nullable();
            $table->string('religious')->nullable();
            $table->boolean('maritalStatus')->nullable();
            $table->boolean('special')->nullable();
            $table->string('category')->nullable();
            $table->boolean('categoryTitr')->default(false);
            $table->boolean('specialTitr')->default(false);
            $table->string('job');
            $table->string('nationality');
            $table->string('dispatchGroup');
            $table->string('militaryResponsibility');
            $table->string('militaryDegree');
            $table->string('education');
            $table->string('nickname');
            $table->longText('biography');
            $table->longText('testament');
            $table->string('shahadatDate');
            $table->string('shahadatLocation');
            $table->string('shahadatOperationName');
            $table->string('shahadatDescription');
            $table->string('memoryTitle');
            $table->string('memoryDescription');
            $table->string('mazarNo');
            $table->string('tombPiece');
            $table->string('graveSite');
            $table->string('bodyPosition');
            $table->string('rowOfTombs');
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
