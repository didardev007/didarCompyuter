<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;


    Protected $guarded=[
        'id'
    ];

    protected $fillable = [
        'name'
    ];

    public function products():HasMany{
        return $this->hasMany(Product::class);
    }
    public $timestamps = false;
}