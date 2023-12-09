<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use App\Traits\Uuid;
use App\Models\Brand;
use App\Models\Product;

class Brand extends Model
{
    use HasFactory, Uuid;

    protected $table = 'brands';

    protected $primaryKey = 'brand_id';
    
    protected $fillable = [
        'brand_name',
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'brand_id');
    }
}
