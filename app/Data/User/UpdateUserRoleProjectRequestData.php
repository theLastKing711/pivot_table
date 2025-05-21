<?php

namespace App\Data\User;

use App\Data\Shared\Swagger\Property\ArrayProperty;
use Illuminate\Support\Collection;
use OpenApi\Attributes as OAT;
use Spatie\LaravelData\Data;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript]
#[Oat\Schema()]
class UpdateUserRoleProjectRequestData extends Data
{
    /**
     * @param  Collection<UpdateUserRoleProjectItemData>  $user_role_projects
     */
    public function __construct(
        #[ArrayProperty(UpdateUserRoleProjectItemData::class)]
        public Collection $user_role_projects,
    ) {}
}
