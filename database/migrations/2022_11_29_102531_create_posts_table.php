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
        Schema::create('posts', function (Blueprint $table) {
            $table->string('customer_code')->primary();
            $table->string('info_1_label')->nullable();
            $table->string('info_1_text')->nullable();
            $table->string('info_2_label')->nullable();
            $table->string('info_2_text')->nullable();
            $table->string('info_3_label')->nullable();
            $table->string('info_3_text')->nullable();
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
        Schema::dropIfExists('posts');
    }
};
