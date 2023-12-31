<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Relations\HasMany;

class InBox extends Model
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
