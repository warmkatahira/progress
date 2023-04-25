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
        Schema::table('posts', function (Blueprint $table) {
            $table->string('info_4_label')->nullable();
            $table->string('info_4_text')->nullable();
            $table->string('info_5_label')->nullable();
            $table->string('info_5_text')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('info_4_label');
            $table->dropColumn('info_4_text');
            $table->dropColumn('info_5_label');
            $table->dropColumn('info_5_text');
        });
    }
};
