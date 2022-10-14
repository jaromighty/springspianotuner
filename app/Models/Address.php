<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Address extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'street',
        'unit',
        'city',
        'state',
        'zip',
        'client_id'
    ];

    protected $appends = [
        'full_address'
    ];

    public function getFullAddressAttribute(): string
    {
        return $this->street.", ".$this->city.", ".$this->state." ".$this->zip;
    }

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function tunings(): BelongsToMany
    {
        return $this->belongsToMany(Tuning::class);
    }
}
