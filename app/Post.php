<?php

namespace App;

use App\Comment;
use App\Tag;
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

        // setlocale(LC_TIME, 'ru_RU.UTF-8');
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
        $user_id = auth()->user()->id;
        //dd($user_id);
        $this->comments()->create(compact('body', 'user_id'));
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

    public static function archives()
    {
        return static::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
        ->groupBy('year', 'month')
        ->orderByRaw('min(created_at) desc')
        ->get()
        ->toArray();
    }

    public function tags()
    {
       return $this->belongsToMany(Tag::class);
    }

}
