<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    
    // tag belongs to many photo
    public function photo(){
        return $this->belongsToMany('App\Models\Photo');
    }

    // tag has pivot class for photos
    public function Photos()
    {
        return $this->belongsToMany('App\Models\Photo')
                    ->using("App\Models\PhotoTag");
    }
}
