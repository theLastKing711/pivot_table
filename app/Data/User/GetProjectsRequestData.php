<?php

namespace App\Data\User;

use OpenApi\Attributes as OAT;
use Spatie\LaravelData\Data;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript]
#[Oat\Schema()]
class GetProjectsRequestData extends Data
{
    public function __construct(
        #[OAT\Property]
        public string $id,
    ) {}
}
