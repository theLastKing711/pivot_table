<?php

namespace App\Http\Controllers\User;

use App\Data\Shared\Swagger\Response\SuccessListResponse;
use App\Data\User\GetProjectsRequestData;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use OpenApi\Attributes as OAT;

class GetProjectsController extends Controller
{
    #[OAT\Get(path: '/users/getprojects', tags: ['users'])]
    #[SuccessListResponse(GetProjectsRequestData::class)]
    public function __invoke(GetProjectsRequestData $request)
    {

        // one query that joins all
        // $user_project_roles =
        //    DB::table('project_role_user')
        //        ->where('users.id', 3)
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

        // multiple quries
        $logged_user =
           User::query()
               ->where('user_id', $request->id)
               ->with([
                   'projects',
                   'roles',
               ])->get();

        return $logged_user;

    }
}
