<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;
use App\Models\Type;
use App\Models\Product;

class ProductAttribute extends Model
{
    use HasFactory, Uuid;

    protected $table = 'product_attributes';

    protected $primaryKey = 'attribute_id';
    
    protected $fillable = [
        'product_id',
        'type_id',
        'attribute_value'
    ];

    public function getType(){
        return $this->belongsTo(Type::class, 'type_id');
    }

    public function getProduct()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

}
