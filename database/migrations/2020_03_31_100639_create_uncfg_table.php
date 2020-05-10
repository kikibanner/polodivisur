<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUncfgTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uncfg', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ip_olt')->nullable();
            $table->string('hostname_olt')->nullable();
            $table->string('fsp')->nullable();
            $table->string('sn')->nullable();
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
        Schema::dropIfExists('uncfg');
    }
}
