<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $table = 'customers';

    protected $primaryKey = 'product_id';
    public $keyType = 'string';
    public $incrementing = false;
    
    protected $fillable = [
        'product_name',
        'desciption',
        'default_price',
        'default_stock_quantity',
        'image',
        'brand_id',
        'category_id',
        'gender',
        'size'
    ];


    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->{$model->getKeyName()} = Str::uuid()->toString();

            $proId = $model->product_id;

            if (request()->hasFile('image')) {
                $image = request()->file('image');
                $image->storeAs("public/images/product_images/$proId", $model->image);
            } else {
                $sourcePath = 'public/images/product_images/defaultavt.png';
                $destinationDirectory = "public/images/product_images/$proId";
                $destinationPath = "$destinationDirectory/defaultavt.png";
                Storage::copy($sourcePath, $destinationPath);
            }
        });

    }
}
