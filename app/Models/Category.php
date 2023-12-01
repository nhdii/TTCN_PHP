<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $primaryKey = 'category_id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'category_name',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($category) {
            // Tạo category_id mới dựa trên category_id cuối cùng
            $lastCategory = Category::query()->orderBy('category_id', 'desc')->first();
            if ($lastCategory) {
                $lastCode = $lastCategory->category_id;
                $codeNumber = (int)substr($lastCode, 1) + 1;
            } else {
                $codeNumber = 1;
            }
            // Format category_id và gán vào model
            $category->category_id = 'C' . str_pad($codeNumber, 2, '0', STR_PAD_LEFT);
        });
    }
}
