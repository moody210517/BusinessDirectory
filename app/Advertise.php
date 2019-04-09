<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advertise extends Model
{
    //
    protected $table = 'advertise';

    public function getRouteKeyName()
    {
        return 'title'; // db column name
    }
    
}
