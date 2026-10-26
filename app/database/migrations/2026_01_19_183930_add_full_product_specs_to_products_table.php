<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('products', function (Blueprint $table) {

        // Power & Electrical
        $table->string('power_supply')->nullable();
        $table->string('power_source')->nullable();
        $table->string('working_voltage')->nullable();
        $table->string('battery_type')->nullable();
        $table->string('battery_voltage')->nullable();
        $table->string('battery_capacity')->nullable();
        $table->string('battery_backup')->nullable();
        $table->string('standby_time')->nullable();
        $table->string('response_time')->nullable();

        // Communication
        $table->string('wired_connectivity')->nullable();
        $table->string('wireless_connectivity')->nullable();
        $table->string('gsm_frequency')->nullable();
        $table->string('rxtx_frequency')->nullable();
        $table->string('protocol')->nullable();
        $table->string('wifi_band')->nullable();
        $table->string('standard')->nullable();
        $table->string('security')->nullable();
        $table->string('ssid_support')->nullable();
        $table->string('sim_type')->nullable();
        $table->string('call_alerts')->nullable();
        $table->string('sms_alerts')->nullable();
        $table->string('antenna_type')->nullable();

        // Sensors
        $table->string('detection_range')->nullable();
        $table->string('detection_angle')->nullable();
        $table->string('pet_immunity')->nullable();
        $table->string('sensitivity_adjustment')->nullable();
        $table->string('trigger_type')->nullable();
        $table->string('frequency_range')->nullable();
        $table->string('gas_type_support')->nullable();
        $table->string('sensor_response_time')->nullable();
        $table->string('indoor_range')->nullable();
        $table->string('outdoor_range')->nullable();
        $table->string('obstruction_tolerance')->nullable();
        $table->string('sensor_battery_type')->nullable();

        // Alarm / Siren
        $table->string('internal_siren')->nullable();
        $table->string('external_siren')->nullable();
        $table->string('siren_loudness_db')->nullable();
        $table->string('alarm_duration')->nullable();
        $table->string('strobe_light')->nullable();

        // Zones / Users
        $table->string('max_zones_supported')->nullable();
        $table->string('sensors_per_zone')->nullable();
        $table->string('total_sensors_supported')->nullable();
        $table->string('total_users')->nullable();
        $table->string('max_remote_attachment')->nullable();

        // Arm / Disarm
        $table->string('modes_supported')->nullable();
        $table->string('auto_arm_disarm')->nullable();

        // Environmental
        $table->string('operating_temperature')->nullable();
        $table->string('storage_temperature')->nullable();
        $table->string('humidity_range')->nullable();
        $table->string('ip_rating')->nullable();

        // Physical & Compliance
        $table->string('material')->nullable();
        $table->string('pcb')->nullable();
        $table->string('dimensions')->nullable();
        $table->string('weight')->nullable();
        $table->string('mounting_type')->nullable();
        $table->string('certifications')->nullable();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            //
        });
    }
};
