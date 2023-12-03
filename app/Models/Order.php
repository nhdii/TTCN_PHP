<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use App\Traits\Uuid;

class Order extends Model
{
    use HasFactory, Uuid;

    protected $table = 'orders';

    protected $primaryKey = 'order_id';
    
    protected $fillable = [
        'customer_id',
        'order_date',
        'delivery_date',
        'status'
    ];
}
