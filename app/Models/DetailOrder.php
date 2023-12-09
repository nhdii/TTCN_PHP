<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailOrder extends Model
{
    use HasFactory;

    protected $table = 'detail_orders';
    protected $primaryKey = ['order_id', 'product_id'];
    public $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'price',
        'notes',
    ];

    public function getProduct(){
        return $this->belongsTo(Product::class, 'product_id');
    }
}
