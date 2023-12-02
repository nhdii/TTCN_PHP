<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use App\Traits\Uuid;

class Customer extends Model
{
    use HasFactory, Uuid;

    protected $table = 'customers';

    protected $primaryKey = 'customer_id';
    
    protected $fillable = [
        'fullname',
        'phone',
        'adress',
        'birthDay',
        'gender',
        'email',
        'password',
        'avata'
    ];

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
