<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->foreignId('brand_id')->constrained('brands')->onDelete('cascade');
            $table->longText('overview');
            $table->string("perDay");
            $table->string('fuel');
            $table->string('modelyear');
            $table->string('seatingCapacity');
            $table->string('image1');
            $table->string('image2');
            $table->string('image3');
            $table->string('image4');
            $table->enum('AirConditioner', ['0', '1'])->default('0');
            $table->enum('PowerDoorLocks', ['0', '1'])->default('0');
            $table->enum('AntiLockBrakingSystem', ['0', '1'])->default('0');
            $table->enum('BrakeAssist', ['0', '1'])->default('0');
            $table->enum('PowerSteering', ['0', '1'])->default('0');
            $table->enum('DriverAirbag', ['0', '1'])->default('0');
            $table->enum('PassengerAirbag', ['0', '1'])->default('0');
            $table->enum('PowerWindows', ['0', '1'])->default('0');
            $table->enum('CDPlayer', ['0', '1'])->default('0');
            $table->enum('CentralLocking', ['0', '1'])->default('0');
            $table->enum('CrashSensor', ['0', '1'])->default('0');
            $table->enum('LeatherSeats', ['0', '1'])->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
