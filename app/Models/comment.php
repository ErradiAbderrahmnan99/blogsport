<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    use HasFactory;
    protected $fillable = ['comment','name','email','website','date','valide','articl_id'];
    protected $hidden = [''];
    public $timestamps = false;

    public function commentpost(){
        return $this->belongsTo('App\Models\articl','articl_id','id');
    }

}
