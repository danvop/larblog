<?php

namespace App;

use App\Comment;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Post extends Model
{
    protected $fillable = [
        'title',
        'body'
    ];
    //
    public function postDate()
    {

        setlocale(LC_TIME, 'ru_RU.UTF-8');
        Carbon::setLocale('ru');
        
        $dt = $this->created_at;
        
        return $dt->diffForHumans();;
    }

    public function postCuttedBody()
    {
        $cutter = "/.*(?=<a name=\"cut\"><\/a>)/s";
        preg_match($cutter, $this->body, $matches);
        // dd($matches[0]);
        return preg_match($cutter, $this->body, $matches) ? $matches[0] : $this->body;
    }

    public function addComment($body)
    {
        $this->comments()->create(compact('body'));
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

}
