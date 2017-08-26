<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'activity_logs';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'session_id', 'updated_table_name', 'updated_field_name','updated_field_old_value','updated_table_pk'
    ];
}
