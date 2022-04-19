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
        Schema::create('realestates', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255)->comment('物件名');
            $table->string('adress', 255)->comment('住所');
            $table->unsignedInteger('breadth')->nullable()->comment('広さ');
            $table->string('floor_plan')->nullable()->comment('間取り');
            $table->unsignedInteger('tenancy_status')->unique()->comment('入居状況');
            $table->unsignedBigInteger('user_id')->comment('物件登録者');
            $table->foreign('user_id')->references('id')->on('accounts');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('realestates');
    }
};
