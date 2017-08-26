<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'clients';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'client_name', 'email', 'phone','address','city','state','country','zip_code','industry','description'
    ];
}
