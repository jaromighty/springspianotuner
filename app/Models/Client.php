<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Client extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'email',
        'first_name',
        'last_name',
        'user_id'
    ];

    protected $appends = [
        'full_name',
        'initials'
    ];

    public function getFullNameAttribute(): string
    {
        return $this->first_name." ".$this->last_name;
    }

    public function getInitialsAttribute(): string
    {
        return $this->first_name[0].$this->last_name[0];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function tunings(): HasMany
    {
        return $this->hasMany(Tuning::class);
    }

    public function addresses(): HasMany
    {
        return $this->hasMany(Address::class);
    }
}
