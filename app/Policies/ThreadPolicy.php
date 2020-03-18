<?php

namespace App\Policies;

use App\User;
use App\Thread;
use Illuminate\Auth\Access\HandlesAuthorization;

class ThreadPolicy
{
    use HandlesAuthorization;

    public function access(User $user, Thread $thread)
    {
        return $user->id === $thread->user_id;
    }
}
