<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    protected $fillable = [
        'name',
        'description',
        'price',
    ];

    public function location(): BelongsTo {
        return $this->belongsTo(Location::class);
    }

    public function inbox(): BelongsTo {
        return $this->belongsTo(InBox::class);
    }

    public function color(): BelongsTo {
        return $this->belongsTo(Color::class);
    }

    public function brand(): BelongsTo {
        return $this->belongsTo(Brand::class);
    }

    public function category(): BelongsTo {
        return $this->belongsTo(Category::class);
    }

    public function country(): BelongsTo {
        return $this->belongsTo(Country::class);
    }


    public function Time(): BelongsTo {
        return $this->belongsTo(Time::class);
    }

    public $timestamps = false;
}
