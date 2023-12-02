<?php

namespace App\Traits;
use Illuminate\Support\Str;

trait Uuid
{
    /**
     * Boot method to generate UUID when creating a new model.
     */
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if(!$model->getKey()){
                $model->setAttribute($model->getKeyName(), Str::uuid()->toString());
            }
        });
    }

    /**
     * Get the key type for the model.
     *
     * @return string
     */
    public function getKeyType()
    {
        return 'string';
    }

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @return bool
     */
    public function getIncrementing()
    {
        return false;
    }
}

