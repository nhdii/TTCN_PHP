<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductAttribute;
use App\Traits\Uuid;

class Type extends Model
{
    use HasFactory, Uuid;

    protected $table = 'types';

    protected $primaryKey = 'type_id';
    
    protected $fillable = [
        'type_name',
    ];

    public function productAttributes()
    {
        return $this->hasMany(ProductAttribute::class, 'type_id');
    }
}
