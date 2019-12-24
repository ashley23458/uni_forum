<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    protected $fillable = [
        'title', 'body', 'user_id', 'forum_id'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    /**
     * Laravel. (2019). Eloquent: Relationships [A belongsTo method for linking another table]. (6.x).
     * Retrieved from https://laravel.com/docs/6.x/eloquent-relationships#one-to-one
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function forum()
    {
        return $this->belongsTo('App\Forum', 'forum_id', 'id');
    }
}
