<?php

namespace App;

use App\Http\Controllers\PostsController;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use Notifiable;

    /*Protected*/
    protected $fillable = [
        'name', 'email', 'password'
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];

    /*Methods*/
    /*Define User can have many posts*/
    public function posts() {
        return $this->hasMany(Post::class);
    }
    /*Define User posting a comment*/
    public function publish(Post $post) {
        $this->posts()->save($post);
    }
}
