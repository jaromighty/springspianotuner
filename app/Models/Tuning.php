<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Tuning extends Model
{
    use HasFactory;

    protected $fillable = [
        'scheduled_at',
        'address_id',
        'client_id'
    ];

    protected $casts = [
        'scheduled_at' => 'datetime:F jS, Y \a\t g:i A'
    ];

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function address(): HasOne
    {
        return $this->hasOne(Address::class);
    }

    public function scopeAvailable($query)
    {
        return $query->where('client_id', null);
    }
}
