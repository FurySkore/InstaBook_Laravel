<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    // photo has many comments
    public function comments() {
        return $this->hasMany('App\Models\Comment');
    }

    // photo belongs to a group
    public function group()
    {
        return $this->belongsTo('App\Models\Group');
    }

    // photo belongs to an user
    public function owner()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    // photo belongs to many user
    public function users()
    {
        return $this->belongsToMany('App\Models\User')->using('App\Models\PhotoUser');
    }

    // photo belongs to many tag
    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag')->using('App\Models\PhotoTag');
    }

    protected static function booted()
    {
        // verifie si la photo appartient au propietaire
        static::creating(function ($photo) {
            return in_array($photo->group->id, $photo->owner->groups->pluck('id')->all());
        });
    }


}