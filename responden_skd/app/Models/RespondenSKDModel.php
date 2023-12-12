<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RespondenSKDModel extends Model
{
    use HasFactory;

    protected $table = 'responden_skd_gusit';
    protected $fillable = [
        'name',
        'affiliation',
        'service_status',
        'phone_number',
        'data_request_time',
        'type_data_request',
        'applicant_token'
    ];
}
