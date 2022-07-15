<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    use HasFactory;

    const STATUS_SUCCESS = 'success';
    const STATUS_FAILED = 'failed';
    const STATUSES = [
        self::STATUS_SUCCESS, self::STATUS_FAILED
    ];

    protected $fillable = ['origin_id' , 'destination_id', 'status'];
}
