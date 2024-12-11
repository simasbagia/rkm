<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class admPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    // public function view(User $user)
    // {
    //     return $user->level == 'Baru'
    //         ? Response::allow()
    //         : Response::deny('This action is forbidden.');
    // }
    public function viewEbaru(User $user)
    {
        return $user->level == 'Baru'
            ? Response::allow()
            : Response::deny('This action is forbidden.');
    }
    public function viewEsuperadmin(User $user)
    {
        return $user->level == 'SuperAdmin'
            ? Response::allow()
            : Response::deny('This action is forbidden.');
    }
    public function viewEpendampingrt(User $user)
    {
        return $user->level == 'Pendamping RT' && $user->aktif == 'A'
            ? Response::allow()
            : Response::deny('This action is forbidden.');
    }
    public function viewEkorkot(User $user)
    {
        return $user->level == 'Korkot'  && $user->aktif == 'A'
            ? Response::allow()
            : Response::deny('This action is forbidden.');
    }
    public function viewEkorcam(User $user)
    {
        return $user->level == 'Korcam'  && $user->aktif == 'A'
            ? Response::allow()
            : Response::deny('This action is forbidden.');
    }
    public function viewEkorkel(User $user)
    {
        return $user->level == 'Korkel'  && $user->aktif == 'A'
            ? Response::allow()
            : Response::deny('This action is forbidden.');
    }
    public function viewEopd(User $user)
    {
        return $user->level == 'OPD' && $user->aktif == 'A'
            ? Response::allow()
            : Response::deny('This action is forbidden.');
    }
}
