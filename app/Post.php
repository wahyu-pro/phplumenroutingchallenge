<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $table = 'posts';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = [
    //     'name', 'email',
    // ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    // protected $hidden = [
    //     'password',
    // ];

    public function author()
    {
        return $this->belongsTo('App\Author');
    }

    public function comment()
    {
        return $this->hasMany('App\Comment');
    }
}
