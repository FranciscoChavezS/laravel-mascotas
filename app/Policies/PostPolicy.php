<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Post;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;
    
    public function author(User $user, Post $post)
    {
        //Creamos una validación en caso de que el usuario creo el post pueda acceder a él
        if($user->id == $post->user_id){
            return true;
        }else{
            return false;
        }
    }
    public function published(User $user, Post $post)
    {
        
    }
}
