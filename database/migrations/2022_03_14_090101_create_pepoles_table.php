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
        Schema::create('pepoles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('mobaile');
            $table->string('phone');
            $table->string('identification_number');
            $table->integer('apartment_number');
            $table->integer('floor_number');
            $table->integer('family_members');
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
        Schema::dropIfExists('pepoles');
    }
};
