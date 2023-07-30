<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Time extends Model
{
    use HasFactory;

    Protected $guarded=[
        'id'
    ];

    Protected $casts=[
      'created-at' => 'datetime',
    ];

    const UPDATED_AT = null;

    public function Product(): HasMany {
        return $this->hasMany(Product::class);
    }
}
