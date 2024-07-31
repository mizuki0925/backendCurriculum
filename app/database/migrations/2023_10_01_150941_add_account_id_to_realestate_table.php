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
        Schema::table('realestate', function (Blueprint $table) {
         //カラムの追加
        $table->bigInteger('account_id')->unsigned()->after('tenancy_status')->comment('物件登録者');
         //カラムの外部キー制約追加
        $table->foreign('account_id')->references('id')->on('accounts')->OnDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('realestate', function (Blueprint $table) {
        //外部キー制約の削除
        $table->dropForeign('realestate_account_id_foreign');
        //カラムの削除
        $table->dropColumn('account_id');
        });
    }
};
