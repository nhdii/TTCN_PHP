<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use App\Traits\Uuid;

class Category extends Model
{
    use HasFactory, Uuid;

    protected $table = 'categories';

    protected $primaryKey = 'category_id';
    
    protected $fillable = [
        'category_name',
    ];


}
