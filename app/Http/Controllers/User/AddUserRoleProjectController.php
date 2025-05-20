<?php

namespace App\Http\Controllers\User;

use App\Data\Shared\Swagger\Request\JsonRequestBody;
use App\Data\Shared\Swagger\Response\SuccessNoContentResponse;
use App\Data\User\AddUserRoleProjectRequestData;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use OpenApi\Attributes as OAT;

class AddUserRoleProjectController extends Controller
{
    #[OAT\Post(path: '/users/adduserroleprojects', tags: ['usersAddUserRoleProjects'])]
    #[JsonRequestBody(AddUserRoleProjectRequestData::class)]
    #[SuccessNoContentResponse]
    public function __invoke(AddUserRoleProjectRequestData $request)
    {
        // Log::info($request->user_role_projects->all());

        // Log::info($request->user_role_projects->toArray());

        // easy way, it works
        DB::table('project_role_user')
            ->insert(
                $request
                    ->user_role_projects
                    ->all()
            );

    }
}
