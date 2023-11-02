<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


/**
 * Adding a function that classifies a single post to a user
 */
class Post extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }
}
//This function tells that a single post belongs to a user