<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectType extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'project_types';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'proj_id', 'type_id'
    ];
}
