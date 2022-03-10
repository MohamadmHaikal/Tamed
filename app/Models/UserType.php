<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    use HasFactory;
    public function activities(){
        return $this->hasMany('App\Models\Activitie' , 'type_id');
    }
}
