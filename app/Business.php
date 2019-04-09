<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    //
    protected $table = 'business';

    public function getRouteKeyName()
    {
        return 'title'; // db column name
    }
    
}
