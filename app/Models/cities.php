<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cities extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','city_name'];

    public function posts(){
        return $this->hasManyThrough('App\Models\post','App\Models\User','city_id','user_id');
    }
}
