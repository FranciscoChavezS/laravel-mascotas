<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }
    public function autorizar(User $user)
    {
        //Creamos una validación si el usuario logueado es igual al id del usuario pueda acceder a la vista
        if(Auth::user()->id == $user->id){
            return true;
        }else{
            return false;
        }
    }
}
