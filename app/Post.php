<?php

namespace App;

use App\Comment;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    protected $fillable = [
        'title',
        'body',
        'user_id'
    ];
    
    public function postDate()
    {

        setlocale(LC_TIME, 'ru_RU.UTF-8');
        Carbon::setLocale('ru');
        
        $dt = $this->created_at;
        
        return $dt->diffForHumans();;
    }

    /**
     * Return Post body above $cutter
     * @return [type] [description]
     */
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

    public function scopeFilter($query, $filters)
    {
        if ($month = $filters['month']) {
            $query->whereMonth('created_at', Carbon::parse($month)->month);
        }

        if ($year = $filters['year']) {
            $query->whereYear('created_at', $year);
        }
    }

}
