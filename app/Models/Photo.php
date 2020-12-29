<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;


  
    // photo has many comment
    public function comments() {
        return $this->hasMany(Comment::class);
    }
    // Photo belongs to a group
    public function group(){
        return $this->belongsTo('App\Models\Group');
    }
    // Essai mais marche pas
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    //Photo has pivot class for user
    public function Users()
    {
        return $this->belongsToMany('App\Models\User')
                    ->using("App\Models\PhotoUser");
    }

    // photo belongs to many tag
    public function tag(){
        return $this->belongsToMany('App\Models\Tag');
    }

    //Photo has pivot class for tags
    public function Tags()
    {
        return $this->belongsToMany('App\Models\Tag')
                    ->using("App\Models\PhotoTag");
    }

}
 