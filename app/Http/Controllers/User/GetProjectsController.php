<?php

namespace App\Http\Controllers\User;

use App\Data\Shared\Swagger\Response\SuccessListResponse;
use App\Data\User\GetProjectsRequestData;
use App\Data\User\PathParameters\UserIdPathParameterData;
use App\Http\Controllers\Controller;
use App\Models\ProjectRoleUser;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use OpenApi\Attributes as OAT;

class GetProjectsController extends Controller
{
    #[
        OAT\PathItem(
            path: '/users/{id}/getprojects',
            parameters: [
                new OAT\PathParameter(
                    ref: '#/components/parameters/usersIdPathParameterData',
                ),
            ],
        ),
    ]
    #[OAT\Get(path: '/users/{id}/getprojects', tags: ['users'])]
    #[SuccessListResponse(GetProjectsRequestData::class)]
    public function __invoke(UserIdPathParameterData $request)
    {

        // 1) one query using query builder that joins all
        // $user_project_roles =
        //    DB::table('project_role_user')
        //     //    ->where('users.id', $request->id)
        //        ->join('users', 'users.id', '=', 'project_role_user.user_id')
        //        ->join('projects', 'projects.id', '=', 'project_role_user.project_id')
        //        ->join('roles', 'roles.id', '=', 'project_role_user.role_id')
        //        ->select(
        //            'project_role_user.*',
        //            'users.name as user_name',
        //            'roles.name as role_name',
        //            'projects.name as project_name',
        //        )
        //        ->get();

        // 2) execute query select * from project_role_user
        // is equivlant in performance and result to DB::table('project_role_user')->get();
        // if we dont' do joins its the fastest solution here
        // return ProjectRoleUser::all();

        // 3) perform only multiple selects and no joins, is the slowest among other solutions here
        // but is the must organized solution that can also get us parent and child relatoins
        // returns [{...pivot_table_data, project: {}, role: {}, locations:[{}]}]

        // $user_id = ProjectRoleUser::query()
        //     ->with('user')
        //     ->where('id', '=', $request->id)
        //     ->firstOrFail()
        //     ->user
        //     ->id;

        // return
        //     ProjectRoleUser::query()
        //         ->whereRelation('user', 'users.id', '=', $request->id)
        //         // ->where('user_id', $user_id) // possibly better performance
        //         ->with([
        //             'project',
        //             'role',
        //             'user',
        //             'locations',
        //         ])
        //         ->get();

        // slower than query builder 1)
        // , but faster than custom pivot table  query 3)
        // performs joins but the data has shape { user: project: [{}], roles:[{}]
        // which doesn't serve us here, unless we made heavy transformation to it.
        // $user_project_roles =
        //    User::query()
        //        ->where('users.id', $request->id)
        //        ->with([
        //            'projects',
        //            'roles',
        //        ])->get();

        // return $user_project_roles;

        return
            User::query()
                ->with(
                    [
                        'projects',
                    ]
                )
                ->get();

    }
}
