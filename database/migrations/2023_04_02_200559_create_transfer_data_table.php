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
        Schema::create('transfer_data', function (Blueprint $table) {
            $table->increments('id');
            $table->string('bank')->nullable();
            $table->string('number_card')->nullable();
            $table->string('name')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->string('number_account')->nullable();
            $table->string('clabe')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transfer_data');
    }
};
