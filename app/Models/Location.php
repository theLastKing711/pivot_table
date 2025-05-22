<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Location extends Model
{
    /** @use HasFactory<\Database\Factories\LocationFactory> */
    use HasFactory;

    /**
     * Get the projectRoleUser that owns the LocationFactory
     */
    public function projectRoleUser(): BelongsTo
    {
        return $this->belongsTo(ProjectRoleUser::class, 'project_role_user_id', 'id');
    }
}
