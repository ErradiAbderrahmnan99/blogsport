<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class articl extends Model
{

    use HasFactory;
    protected $fillable = ['title','descr','image','date','ref','categorie_id','user_id'];
    protected $hidden = [''];
    public $timestamps = false;

    public function category(){
        return $this->belongsTo('App\Models\categorie','categorie_id','id');
    }

    public function userarticl(){
        return $this->belongsTo('App\Models\user','user_id','id');
    }

    public function articlcomment(){
        return $this->hasMany('app\Models\comment','articl_id','id');
    }


}
