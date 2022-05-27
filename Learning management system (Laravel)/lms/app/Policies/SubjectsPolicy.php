<?php

namespace App\Policies;

use App\Models\Subjects;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SubjectsPolicy
{
    use HandlesAuthorization;

    public function access(User $user, Subjects $subjects)
    {
        return $subjects -> user -> id === $user->id;
    }

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Subjects  $subjects
     * @return mixed
     */
    public function view(User $user, Subjects $subjects)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Subjects  $subjects
     * @return mixed
     */
    public function update(User $user, Subjects $subjects)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Subjects  $subjects
     * @return mixed
     */
    public function delete(User $user, Subjects $subjects)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Subjects  $subjects
     * @return mixed
     */
    public function restore(User $user, Subjects $subjects)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Subjects  $subjects
     * @return mixed
     */
    public function forceDelete(User $user, Subjects $subjects)
    {
        //
    }
}
