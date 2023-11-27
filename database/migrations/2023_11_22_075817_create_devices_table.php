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
        Schema::create('devices', function (Blueprint $table) {
            $table->id();
            $table->string('device_number', 255);
            $table->string('device_name', 255);
            $table->text('device_ip');
            $table->text('device_port');
            $table->text('device_public_ip');
            $table->text('device_public_port');
            $table->text('device_serial_number');
            $table->string('device_model', 255);
            $table->string('device_machine_no', 255);
            $table->string('device_install_location', 255);
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
        Schema::dropIfExists('devices');
    }
};
