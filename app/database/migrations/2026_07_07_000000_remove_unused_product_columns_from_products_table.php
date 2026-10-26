<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $columns = [
                'power_supply',
                'power_source',
                'working_voltage',
                'battery_type',
                'battery_voltage',
                'battery_capacity',
                'battery_backup',
                'standby_time',
                'response_time',
                'wired_connectivity',
                'wireless_connectivity',
                'gsm_frequency',
                'rxtx_frequency',
                'protocol',
                'wifi_band',
                'standard',
                'security',
                'ssid_support',
                'sim_type',
                'call_alerts',
                'sms_alerts',
                'antenna_type',
                'detection_range',
                'detection_angle',
                'pet_immunity',
                'sensitivity_adjustment',
                'trigger_type',
                'frequency_range',
                'gas_type_support',
                'sensor_response_time',
                'indoor_range',
                'outdoor_range',
                'obstruction_tolerance',
                'sensor_battery_type',
                'internal_siren',
                'external_siren',
                'siren_loudness_db',
                'alarm_duration',
                'strobe_light',
                'max_zones_supported',
                'sensors_per_zone',
                'total_sensors_supported',
                'total_users',
                'max_remote_attachment',
                'modes_supported',
                'auto_arm_disarm',
                'operating_temperature',
                'storage_temperature',
                'humidity_range',
                'ip_rating',
                'material',
                'pcb',
                'dimensions',
                'weight',
                'mounting_type',
                'certifications',
            ];

            foreach ($columns as $column) {
                if (Schema::hasColumn('products', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('power_supply')->nullable();
            $table->string('power_source')->nullable();
            $table->string('working_voltage')->nullable();
            $table->string('battery_type')->nullable();
            $table->string('battery_voltage')->nullable();
            $table->string('battery_capacity')->nullable();
            $table->string('battery_backup')->nullable();
            $table->string('standby_time')->nullable();
            $table->string('response_time')->nullable();
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
            $table->string('internal_siren')->nullable();
            $table->string('external_siren')->nullable();
            $table->string('siren_loudness_db')->nullable();
            $table->string('alarm_duration')->nullable();
            $table->string('strobe_light')->nullable();
            $table->string('max_zones_supported')->nullable();
            $table->string('sensors_per_zone')->nullable();
            $table->string('total_sensors_supported')->nullable();
            $table->string('total_users')->nullable();
            $table->string('max_remote_attachment')->nullable();
            $table->string('modes_supported')->nullable();
            $table->string('auto_arm_disarm')->nullable();
            $table->string('operating_temperature')->nullable();
            $table->string('storage_temperature')->nullable();
            $table->string('humidity_range')->nullable();
            $table->string('ip_rating')->nullable();
            $table->string('material')->nullable();
            $table->string('pcb')->nullable();
            $table->string('dimensions')->nullable();
            $table->string('weight')->nullable();
            $table->string('mounting_type')->nullable();
            $table->string('certifications')->nullable();
        });
    }
};
