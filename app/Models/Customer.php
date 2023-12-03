<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Str;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers';

    protected $primaryKey = 'customer_id';
    public $keyType = 'string';
    public $incrementing = false;
    
    protected $fillable = [
        'fullName',
        'phone',
        'address',
        'birthDay',
        'gender',
        'email',
        'password',
        'avatar'
    ];


    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->{$model->getKeyName()} = Str::uuid()->toString();

            $userId = $model->customer_id;

            if (request()->hasFile('avatar')) {
                $image = request()->file('avatar');
                $image->storeAs("public/images/user_avt/$userId", $model->avatar);
            } else {
                $sourcePath = 'public/images/user_avt/defaultavt.png';
                $destinationDirectory = "public/images/user_avt/$userId";
                $destinationPath = "$destinationDirectory/defaultavt.png";
                Storage::copy($sourcePath, $destinationPath);
            }
        });

    }

    public function setBirthDayAttribute($value)
    {
        $this->attributes['birthDay'] = date('Y-m-d', strtotime(str_replace('/', '-', $value)));
    }

    protected function getBirthDay(): Attribute
    {
        return Attribute::make(
            get: function ($value, $attribute)
            {
                return date('d/m/Y', strtotime($attribute['birthDay']));
            }
        );
    }
}