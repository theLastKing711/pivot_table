<?php

namespace Database\Factories;

use App\Models\ProjectRoleUser;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\Sequence;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Location>
 */
class LocationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
        ];
    }

    public function withProjectRoleUser(): static
    {

        // / The closure will be invoked each time the sequence needs a new value
        return $this->state(new Sequence(
            fn (Sequence $sequence) => ['project_role_user_id' => ProjectRoleUser::all()->random()->id],
        ));
    }
}
