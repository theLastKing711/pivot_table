<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ProjectRoleUser extends Pivot
{
    protected $table = 'project_role_user';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    /**
     * Get the user that owns the ProjectRoleUser
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the user that owns the ProjectRoleUser
     */
    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * Get the user that owns the ProjectRoleUser
     */
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * Get all of the locatoins for the ProjectRoleUser
     */
    public function locations(): HasMany
    {
        return $this->hasMany(Location::class, 'project_role_user_id', 'id');
    }
}
