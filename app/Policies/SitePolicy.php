<?php

namespace App\Policies;

use App\Site;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SitePolicy
{
    use HandlesAuthorization;

    public function index(User $user) {
        return in_array($user->role, [ROLE_USER]);
    }

    public function index_all(User $user) {
        //only admin can index_all (checked at AuthServiceProvider)
        return false;
    }

    public function create(User $user) {
        return in_array($user->role, [ROLE_USER]);
    }

    public function store(User $user) {
        return in_array($user->role, [ROLE_USER]);
    }

    public function edit(User $user, Site $site) {
        return $site->author == $user->id;
    }

    public function update(User $user, Site $site) {
        return $site->author == $user->id;
    }

    public function destroy(User $user, Site $site) {
        return $site->author == $user->id;
    }
}
