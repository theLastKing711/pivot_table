<?php

namespace App\Data\User;

use App\Data\Shared\Swagger\Property\DateProperty;
use OpenApi\Attributes as OAT;
use Spatie\LaravelData\Data;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript]
#[Oat\Schema()]
class GetUserRoleProjectRequestData extends Data
{
    public function __construct(
        #[OAT\Property]
        public int $id,

        #[OAT\Property]
        public int $user_id,
        #[OAT\Property]
        public int $project_id,
        #[OAT\Property]
        public int $role_id,
        #[OAT\Property]
        public bool $is_active,
        #[OAT\Property]
        public string $user_name,
        #[OAT\Property]
        public string $project_name,
        #[OAT\Property]
        public string $role_name,
        #[DateProperty]
        public ?string $created_at,
    ) {}
}
