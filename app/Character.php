<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    //
    protected $fillable=[
        'name',
        // 'slug',
        'image_hero',
        'description'
    ];

    public function comics(){
        return $this->belongsToMany('App\Comic');
    }
}
