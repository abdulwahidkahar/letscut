<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    protected $fillable = [
        'name',
        'phone_number',
    ];

    public function queues(): HasMany
    {
        return $this->hasMany(Queue::class);
    }
}
