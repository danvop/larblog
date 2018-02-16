<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public function toggleComplete()
    {
        $this->completed == 0 ? $this->completed = 1 : $this->completed = 0;

        return $this;
    }

    public function scopeIncomplete($query)
    {
        return $query->where('completed', 0);
    }

    public function postDate()
    {
        setlocale(LC_TIME, 'ru_RU.UTF-8');
        Carbon::setLocale('ru');
        $dt = new Carbon($this->updated_at);
        //dd($dt->formatLocalized('%B %d, %Y'));
        //setlocale(LC_TIME, '');
        return Carbon::now()->addYear()->addYear()->diffForHumans();
        return $dt->formatLocalized('%B %d, %Y');
    }
}
