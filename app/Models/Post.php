<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $guarded = [];

    /**
     * Post Category
     */
    public function categories(){
        return $this -> belongsToMany('App\Models\Category');
    }

    /**
     * Post Tag
     */
    public function tags(){
        return $this -> belongsToMany('App\Models\Tag');
    }

    /**
     * Post Author
     */
    public function author(){
        return $this -> belongsTo('App\Models\User', 'user_id', 'id');
    }
}
