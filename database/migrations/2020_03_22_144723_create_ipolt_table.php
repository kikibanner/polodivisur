<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIpoltTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ipolt', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('sto');
            $table->string('merk');
            $table->string('type');
            $table->string('hostname');
            $table->string('ip_oam');
            $table->string('metro')->nullable();
            $table->string('metro_port_1')->nullable();
            $table->string('metro_port_2')->nullable();
            $table->string('vlan_inet')->nullable();
            $table->string('alamat')->nullable();
            $table->string('grup')->nullable();
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ipolt');
    }
}
