<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSession extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_sessions';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id','end_time'
    ];
}
