<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PaymentGatewayPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        if ($user->hasRole('super-admin')) {
            return true;
        }
    }

    public function view(User $user)
    {
        if ($user->hasRole('super-admin')) {
            return true;
        }
    }

    public function create(User $user)
    {
        if ($user->hasRole('super-admin')) {
            return true;
        }
    }

    public function update(User $user)
    {
        if ($user->hasRole('super-admin')) {
            return true;
        }
    }

    public function delete(User $user)
    {
        if ($user->hasRole('super-admin')) {
            return true;
        }
    }
}
