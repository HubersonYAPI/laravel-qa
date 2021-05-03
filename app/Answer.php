<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getBodyHtmlAttribute(){

        return \Parsedown::instance()->text($this->body);
    }

    public static function boot()
    {
        parent::boot();

        static::created(function($answer){
            echo "Response créée\n";
        });

        static::saved(function($answer){
            echo "Response enregistrée\n";
        });
    }

    public function getCreatedDateAttribute()
    {
        return $this->created_at->diffForHumans();
        // return $this->created_at->format("d/m/Y");
    }
}
