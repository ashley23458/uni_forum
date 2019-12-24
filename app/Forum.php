<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    /**
     * Laravel. (2019). Eloquent: Relationships [A hasMany method for linking another table.]. (6.x).
     * Retrieved from https://laravel.com/docs/6.x/eloquent-relationships#one-to-many
     */
    public function threads() {
        return $this->hasMany('App\Thread');
    }
}
