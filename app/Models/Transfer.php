<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transfer extends Model
{
    use HasFactory;

    const STATUS_SUCCESS = 'success';
    const STATUS_FAILED = 'failed';
    const STATUSES = [
        self::STATUS_SUCCESS, self::STATUS_FAILED
    ];

    protected $fillable = ['origin_id', 'destination_id', 'amount', 'status'];


    public function originAccount(): BelongsTo
    {
        return $this->belongsTo(BankAccount::class, 'origin_id');
    } 
    
    public function DestinationAccount(): BelongsTo
    {
        return $this->belongsTo(BankAccount::class, 'destination_id');
    }
}
