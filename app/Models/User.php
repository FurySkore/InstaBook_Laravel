<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    
        //user has many comments
        public function comments() {
            return $this->hasMany('App\Models\Comment');
        }
    
        //user has many photos
        public function photos() {
            return $this->hasMany('App\Models\Photo');
        }

        //user appears on many photo
        public function Photo() {
            return $this->belongsToMany("App\Models\Photo")
                        ->using('Illuminate\Database\Eloquent\Collection');
        }

        //user has pivot class for photos appearance
        public function PhotosAppearance()
        {
            return $this->belongsToMany('App\Models\Photo')
                        ->using("App\Models\PhotoUser");
        }
    
        //user has many groups
        public function group() {
            return $this->belongsToMany('App\Models\Group');
        }
    
        //user has pivot class for groups
        public function Groups()
        {
            return $this->belongsToMany('App\Models\Group')
                        ->using("App\Models\GroupUser");
        }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
