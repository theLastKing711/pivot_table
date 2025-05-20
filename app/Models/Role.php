<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
{
    /** @use HasFactory<\Database\Factories\RoleFactory> */
    use HasFactory;

    public function users(): BelongsToMany
    {
        return
            $this
                ->belongsToMany(User::class, 'project_role_user')
                ->withTimestamps();
    }

    /**
     * The roles that belong to the Project
     */
    public function projects(): BelongsToMany
    {
        return
            $this
                ->belongsToMany(Project::class, 'project_role_user')
                ->withTimestamps();
    }
}
