<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessRate extends Model
{
    //
    protected $table = 'business_rate';

    public function getRouteKeyName()
    {
        return 'title'; // db column name
    }
   
}
