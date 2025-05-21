<?php

namespace App\Data\User;

use OpenApi\Attributes as OAT;
use Spatie\LaravelData\Data;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript]
#[Oat\Schema()]
class UpdateUserRoleProjectItemData extends Data
{
    public function __construct(
        #[OAT\Property]
        public int $id,
        #[OAT\Property]
        public int $project_id,
        #[OAT\Property]
        public int $role_id,
        #[OAT\Property]
        public int $user_id,
        #[OAT\Property]
        public bool $is_active,
    ) {}
}
