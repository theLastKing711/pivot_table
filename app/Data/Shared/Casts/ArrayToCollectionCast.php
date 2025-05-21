<?php

namespace App\Data\Shared\Casts;

use App\Data\User\AddUserRoleProjectItemData;
use Illuminate\Support\Facades\Log;
use Spatie\LaravelData\Casts\Cast;
use Spatie\LaravelData\Casts\IterableItemCast;
use Spatie\LaravelData\Support\Creation\CreationContext;
use Spatie\LaravelData\Support\DataProperty;

class ArrayToCollectionCast implements Cast, IterableItemCast
{
    public function castIterableItem(DataProperty $property, mixed $value, array $properties, CreationContext $context): mixed
    {
        Log::info('hello world');

        Log::info($property);

        return $value;

    }

    public function cast(DataProperty $property, mixed $value, array $properties, CreationContext $context): mixed
    {

        $collection_from_array = collect($value);

        $x = collect([
            new AddUserRoleProjectItemData(
                1,
                1,
                1,
                true
            ),
        ]);
        Log::info($x->first());

        Log::info($collection_from_array->first());

        return $collection_from_array;

    }
}
