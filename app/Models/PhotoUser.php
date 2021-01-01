<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class PhotoUser extends Pivot
{
    use HasFactory;

    protected $table = "photo_user";

    // incrementation de l'id
    public $incrementing = true;

    // recuperation de l'user
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    // recuperation de la photo
    public function photo()
    {
        return $this->belongsTo('App\Models\Photo');
    }

    // photo user is not created for user who does not belong to same group
    protected static function booted()
    {
        // verifie si la photo appartient au groupe d'utilisateur
        static::creating(function ($photoUser) {
            return in_array($photoUser->photo->group->id, $photoUser->user->groups->pluck('id')->all());
        });
    }
}