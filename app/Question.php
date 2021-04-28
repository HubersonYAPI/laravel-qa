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
}
