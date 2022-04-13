<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{
    use HasFactory;
    protected $table = 'ads';
    protected $primaryKey = 'id';

    protected $fillable = [
        'type',
        'title',
        'description',
       'city',
       'neighborhood',
       'price',
       'pricestatus',
       'onMap',
       'lng',
       'lat',
       'deadline',
       'startdate',
       'seenCount',
       'QuotesCount',
       'infoArray',
       'user_id',
       'activitie_id',
    ];

    public function activity(){
        return $this->belongsTo('App\Models\Activitie' , 'activitie_id');
    }
    public function user(){
        return $this->belongsTo('App\Models\User' , 'user_id');
    }

    public function File(){
        return $this->hasMany('App\Models\File' , 'FK');
    }

}
