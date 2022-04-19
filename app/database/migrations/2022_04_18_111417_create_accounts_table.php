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
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255)->comment('名前');
            $table->string('password', 255)->comment('パスワード');
            $table->string('email', 255)->unuque()->comment('メールアドレス');
            $table->string('tel', 20)->nullable()->comment('電話番号');
            $table->integer('role')->nullable()->comment('権限');
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
        Schema::dropIfExists('accounts');
    }
};
