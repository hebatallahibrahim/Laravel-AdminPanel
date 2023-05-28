<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Post;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;






    public function create(?User $user)
    {
       if($user->permissions->contains('name', 'create')){
            return true;
        }
        return false;
    }

    /**
     * Undocumented function
     *
     * @param User $user
     * @param Post $post
     * @return void
     */
    public function edit(?User $user, Post $post)

    {

        if($user->permissions->contains('slug', 'edit')) {
            return true;
        } elseif ($user->roles->contains('slug', 'admin')) {
            return true;
        }
        return false;

    }


    public function update(User $user, Post $post)
    {
        if($user->roles->contains('slug', 'admin')){
            return true;
        } elseif($user->permissions->contains('slug', 'edit')) {
            return true;
        } elseif($post->userId == $user->id) {
            return true;
        }

        return false;
    }


    public function delete(?User $user, Post $post)
    {
        if($user->permissions->contains('slug', 'delete')) {
            return true;
        } elseif ($user->roles->contains('slug', 'admin')) {
            return true;
        }
        return false;
}

}



