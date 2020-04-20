<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Te7aHoudini\LaravelTrix\Traits\HasTrixRichText;

class Thread extends Model
{
    use HasTrixRichText;

    protected $guarded = [];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function forum()
    {
        return $this->belongsTo('App\Forum', 'forum_id', 'id');
    }
}
