<?php

namespace App\Policies;

use App\Models\Evento;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class EventoPolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return in_array($user->role, ['admin', 'gerente']);
    }

    public function update(User $user, Evento $evento): bool
    {
        return in_array($user->role, ['admin', 'gerente']);
    }

    public function delete(User $user, Evento $evento): bool
    {
        return $user->isAdmin();
    }
}

