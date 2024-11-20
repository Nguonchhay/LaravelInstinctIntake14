<?php

namespace App\Policies;

use App\Models\User;

class ServicePolicy
{
    
    public function createAndStore(User $user) {
        return $user->role === ROLE_ADMIN;
    }

    public function editAndUpdate(User $user) {
        return $user->role === ROLE_ADMIN;
    }

    public function destroy(User $user) {
        return $user->role === ROLE_ADMIN;
    }

}
