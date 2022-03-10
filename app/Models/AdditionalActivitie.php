<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdditionalActivitie extends Model
{
    use HasFactory;
    public function Activitie(){
        return $this->belongsTo('App\Models\Activitie' , 'activitie_id');
    }
}
