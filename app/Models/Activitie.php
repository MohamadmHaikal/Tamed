<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activitie extends Model
{
    use HasFactory;
    public function userType(){
        return $this->belongsTo('App\Models\UserType' , 'type_id');
    }
    public function AdditionalActivitie(){
        return $this->hasMany('App\Models\AdditionalActivitie' , 'activitie_id');
    }
}
