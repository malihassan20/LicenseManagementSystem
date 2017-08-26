<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'technologies';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'technology_name'
    ];
}
