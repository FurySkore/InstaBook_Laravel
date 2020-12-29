<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    // Comment belongs to a photo
    public function Photo(){
        return $this->belongsTo('App\Models\Photo');
    }

    // Comment belongs to an user
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    //comment is a reply to another comment
    public function replyTo(){
        return $this->belongsTo('App\Models\Comment','comment_id');
    }

    //comment has many replies
    public function replies(){
        return $this->hasMany('App\Models\Comment');
    }
}
