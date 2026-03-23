<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    // Megnézi, hogy a user admin-e (create, viewAny, stb.)
    public function before(User $user, string $ability)
    {
        if ($user->is_admin) {  // feltételezett admin mező a User modellen
            return true;
        }
    }

    // Listázás (index)
    public function viewAny(User $user)
    {
        return true;  // mindenki láthatja a listát
    }

    // Egy poszt megtekintése (show)
    public function view(User $user, Post $post)
    {
        return true;  // mindenki láthatja egy posztot
    }

    // Új poszt létrehozása (create/store)
    public function create(User $user)
    {
        return $user->id !== null;  // bejelentkezett user
    }

    // Poszt frissítése (update)
    public function update(User $user, Post $post)
    {
        return $user->id === $post->user_id;  // csak a tulajdonos
    }

    // Poszt törlése (delete)
    public function delete(User $user, Post $post)
    {
        return $user->id === $post->user_id;  // csak a tulajdonos
    }
}
