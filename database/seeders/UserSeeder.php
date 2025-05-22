<?php

namespace Database\Seeders;

use App\Models\Location;
use App\Models\Project;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $roles = Role::factory()->count(3)->create();

        $proejcts = Project::factory()->count(3)->create();

        $users = User::factory()
            ->hasRolesAndProjects()
            ->count(3)
            ->create();

        Location::factory()
            ->withProjectRoleUser()
            ->count(3)
            ->create();

    }
}
