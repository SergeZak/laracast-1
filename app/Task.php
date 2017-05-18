<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{


    function scopeIncomplete($query)
    {
        return $query->where('completed', 0);
    }


}
