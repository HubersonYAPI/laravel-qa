<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class Question extends Model
{
    use Notifiable;

    protected $fillable =['title', 'body'];

    public function user()
    {
        return $this->belongsTo('App\User','user_id' );
    }

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = str::slug($value);
    }

    public function getUrlAttribute()
    {
        return route ("questions.show", $this->id);
    }
    
    public function getCreatedDateAttribute()
    {
        return $this->created_at->diffForHumans();
        // return $this->created_at->format("d/m/Y");
    }

    public function getStatusAttribute()
    {
        if ($this->answers > 0) {
            if ($this->best_answer_id) {
                return "answered-accepted";
            }
            return "answered";
        }
        return "unanswered";
    }


}
