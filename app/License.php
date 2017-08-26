<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class License extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'licenses';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'proj_id', 'license_key', 'license_status','start_date','expiry_date','remarks'
    ];
}
