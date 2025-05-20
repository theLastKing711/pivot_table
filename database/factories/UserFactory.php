<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
        ];
    }

    public function hasRolesAndProjects(): static
    {
        return $this->afterCreating(function (User $user) {

            $projects =
                Project::inRandomOrder()
                    ->limit(2)
                    ->get();

            // $random_projects = $this->faker()->randomElement($projects);

            $roles =
                Role::inRandomOrder()
                    ->limit(2)
                    ->get();

            // $ids =
            //     $projects->map(function (Project $project) {
            //         return [2 => [52 => 3]];
            //     }
            //     );

            // $x = $projects->map(fn (Project $project) => [$project->id => ['role_id' => $this->faker->randomElement($roles)->id]]
            // )->flatten();

            // Log::info($x);

            $x = [];

            $projects->each(function (Project $project) use (&$x, $roles) {
                $x[$project->id] = [
                    'role_id' => $this->faker->randomElement($roles)->id,
                    'is_active' => $this->faker->boolean(),
                ];
            });

            $user->projects()->attach($x);

            // $user->projects()->attach([1 => ['role_id' => $this->faker->randomElement($roles)->id]]);

            // $user->projects()->attach(
            // )
            // ->map(fn (Project $project) => ['1' => ['role_id' => $this->faker->randomElement($roles)->id]]
            // )->flatten(1)
            // );
        });
    }
}
