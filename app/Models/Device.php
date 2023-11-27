<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Device extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'devices';

    protected $dates = ['deleted_at'];

    public $fillable = [

        'device_number',
        'device_name',
        'device_ip',
        'device_port',
        'device_public_ip',
        'device_public_port',
        'device_serial_number',
        'device_model',
        'device_machine_no',
        'device_install_location',
    ];

    protected $casts = [

        'id' => 'integer',
        'device_number' => 'string',
        'device_name' => 'string',
        'device_ip' => 'string',
        'device_port' => 'string',
        'device_public_ip' => 'string',
        'device_public_port' => 'string',
        'device_serial_number' => 'string',
        'device_model' => 'string',
        'device_machine_no' => 'string',
        'device_install_location' => 'string',

    ];
}
