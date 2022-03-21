<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\UserType;

class Activitie extends Model
{
    use HasFactory;

    protected $table = 'activities';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'type_id'
    ];


    public function relation(){
        return $this->belongsTo('App\Models\UserType' , 'type_id');
    }
    public function AdditionalActivitie(){
        return $this->hasMany('App\Models\AdditionalActivitie' , 'activitie_id');
    }
    public function getColumn($id ='')
    {
        $userType = UserType::all();
        if ($id != "") {
        
            $ValueColumn=Activitie::where('id',$id)->first();
            return [(object)  [ 'columnName' => 'name',
                                'columnType' => 'text',
                                'ValueColumn' =>$ValueColumn->name,
                                'IDColumn' =>$ValueColumn->id ],
                    (object)   ['columnName' => 'type_id',
                    'columnType' => 'select',
                    'ValueColumn' =>$ValueColumn->userType->name,
                    'options' => $userType
                    ] ,
            
            ];
 
        }else{
            return [
                (object)  [ 'columnName' => 'name',
                         'columnType' => 'text'] ,
                (object)   ['columnName' => 'type_id',
                'columnType' => 'select',
                'options' => $userType
                ] ,
        
        ]; }
    }

    public function getTitleColumn()
    {
        return [
            'id',  
                 'name',
                'User Type' 
                ];
    }
}
