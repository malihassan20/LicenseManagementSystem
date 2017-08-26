<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectTechnology extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'project_technologies';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'proj_id', 'tech_id'
    ];
}
