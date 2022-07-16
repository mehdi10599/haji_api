<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSecondaryInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('secondary_infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('shahidId');
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
        Schema::dropIfExists('secondary_infos');
    }
}
