<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Brand;

class Brand extends Model
{
    use HasFactory;

    protected $primaryKey = 'brand_id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'brand_name',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($brands) {
            // Tạo brand_id mới dựa trên brand_id cuối cùng
            $lastBrand = Brand::query()->orderBy('brand_id', 'desc')->first();
            if ($lastBrand) {
                $lastCode = $lastBrand->brand_id;
                $codeNumber = (int)substr($lastCode, 2) + 1;
            } else {
                $codeNumber = 1;
            }
            // Format brand_id và gán vào model
            $brands->brand_id = 'BR' . str_pad($codeNumber, 4, '0', STR_PAD_LEFT);
        });
    }
}
