<?php

namespace App\Data\User;

use App\Data\Shared\Casts\ArrayToCollectionCast;
use App\Data\Shared\Swagger\Property\ArrayProperty;
use Illuminate\Support\Collection;
use OpenApi\Attributes as OAT;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript]
#[Oat\Schema()]
class AddUserRoleProjectRequestData extends Data
{
    public function __construct(

        #[WithCast(ArrayToCollectionCast::class)]
        #[ArrayProperty(AddUserRoleProjectItemData::class)]
        /** @var AddUserRoleProjectItemData[] */
        public Collection $user_role_projects,
    ) {}
}
