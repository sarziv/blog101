<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;



class Post extends Model
{
    /*Protected*/
    protected $guarded = [];

    /*Methods*/
    /*Define Post can have many comments*/
    public function comments ()
    {
        return $this->hasMany(Comment::class);
    }
    /*Define in Post belongs to User*/
    public function user ()
    {
        return $this->belongsTo(User::class);
    }
    /*Define comments -> create comment on this post*/
    public function addComment($body)
    {
        Comment::create([
            'body' => $body,
            'post_id' => $this->id,
            'user_id' => auth()->id()
        ]);
    }
    public function scopeFilter( $query, $filter) {
        if($month = $filter['month']){
            $query ->whereMonth('created_at',Carbon::parse($month)->month);
        }
        if($year = $filter['year']){
            $query ->whereYear('created_at',$year);
        }
    }
    public static function archives() {

        return static::selectRaw('year (created_at) year, monthname (created_at) month, count(*) published')
            ->groupBy('year','month')
            ->orderByRaw('min(created_at) desc')
            ->get()
            ->toArray();
    }
    public function tags(){
       return $this->belongsToMany(Tag::class);
    }
}
