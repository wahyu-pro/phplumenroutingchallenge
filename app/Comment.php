<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $table = 'comments';
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

    public function post()
    {
        return $this->belongsTo('App\Post');
    }
}
