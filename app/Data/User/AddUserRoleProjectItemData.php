<?php

namespace App\Data\User;

use OpenApi\Attributes as OAT;
use Spatie\LaravelData\Data;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript]
#[Oat\Schema()]
class AddUserRoleProjectItemData extends Data
{
    public function __construct(
        #[OAT\Property]
        public int $project_id,
        #[OAT\Property]
        public int $role_id,
        #[OAT\Property]
        public int $user_id,
    ) {}
}
