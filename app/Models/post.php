<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    protected $fillable = ['user_id','title','content'];

    /**
     * Summary of comment
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function comment(){
        return $this->morphMany('App\Models\comments','commentable');
    }
}
