<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tuning extends Model
{
    use HasFactory;

    protected $fillable = [
        'scheduled_at',
        'address_id',
        'client_id'
    ];
}
