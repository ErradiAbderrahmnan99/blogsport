<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categorie extends Model
{
    use HasFactory;
    protected $fillable = ['name','image','ref_cat'];
    protected $hidden = [''];
    public $timestamps = false;

    public function artyicl(){
        return $this->hasMany('App\Models\articl','categorie_id','id');
    }
}
