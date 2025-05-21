<?php

namespace App\Http\Controllers\User;

use App\Data\Shared\Swagger\Response\SuccessListResponse;
use App\Data\User\GetUserRoleProjectRequestData;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use OpenApi\Attributes as OAT;

class GetUserRoleProjectController extends Controller
{
    #[OAT\Get(path: '/users/getuserroleprojects', tags: ['users'])]
    #[SuccessListResponse(GetUserRoleProjectRequestData::class)]
    public function __invoke()
    {

        $user_project_roles =
            DB::table('project_role_user')
                ->join('users', 'users.id', '=', 'project_role_user.user_id')
                ->join('projects', 'projects.id', '=', 'project_role_user.project_id')
                ->join('roles', 'roles.id', '=', 'project_role_user.role_id')
                ->select(
                    'project_role_user.*',
                    'users.name as user_name',
                    'roles.name as role_name',
                    'projects.name as project_name',
                )
                ->get();

        return
            GetUserRoleProjectRequestData::collect(
                $user_project_roles
            );

    }
}
