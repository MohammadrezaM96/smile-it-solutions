<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BankAccount extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'amount'];

    /**
     * Get the user for the bank accounts.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
