<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFiscalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fiscals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user');
            $table->string('password');
            $table->string('rfc',13)->nullable();
            $table->string('name',80)->nullable();
            $table->integer('fiscal_regime')->nullable();
            $table->longText('certificate')->nullable();
            $table->longText('private_key')->nullable();
            $table->string('private_key_password')->nullable();
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
        Schema::dropIfExists('fiscals');
    }
}
