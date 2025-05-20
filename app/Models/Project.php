<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Project extends Model
{
    /** @use HasFactory<\Database\Factories\ProjectFactory> */
    use HasFactory;

    /**
     * Get the user that owns the Project
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'project_role_user');
    }

    /**
     * The roles that belong to the Project
     */
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'project_role_user');
    }
}
