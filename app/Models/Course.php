<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Episode;

class Course extends Model
{
    protected $fillable = ['title', 'type', 'slug', 'body', 'price','tags','images','videos','time','view_count', 'comment_count'];

    protected $casts = [
        'images' => 'array'
    ];

   
    public function episode()
    {
        return $this->hasMany(Episode::class);
    }


    public function download()
    {
        if (! auth()->check()) return '#';
        $status = false;
        switch ($this->type){
            case 'free' :
                $status = true;
                break;
            case 'vip' :
                if (auth()->user()->isActive()) $status = true;
                break;
            case 'cash' :
                if (auth()->user()->checkLearning($this->course)) $status = true;
                break;
        }

        $timestamp = Carbon::now()->addHour(5)->timestamp;
        $hash = Hash::make('t@d@d@t@sj45n43js43dn#*d'.$this->id.request()->ip().$timestamp);

        return $status ? "/download/$this->id?mac=$hash&t=$timestamp" : "#";

    }
}
