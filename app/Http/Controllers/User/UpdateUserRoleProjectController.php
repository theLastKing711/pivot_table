<?php

namespace App\Http\Controllers\User;

use App\Data\Shared\Swagger\Request\JsonRequestBody;
use App\Data\Shared\Swagger\Response\SuccessNoContentResponse;
use App\Data\User\UpdateUserRoleProjectRequestData;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use OpenApi\Attributes as OAT;

class UpdateUserRoleProjectController extends Controller
{
    #[OAT\Patch(path: '/users/updateuserroleprojects', tags: ['users'])]
    #[JsonRequestBody(UpdateUserRoleProjectRequestData::class)]
    #[SuccessNoContentResponse]
    public function __invoke(UpdateUserRoleProjectRequestData $request)
    {

        $user_role_projects =
            $request
                ->user_role_projects;

        $user_role_projects->each(function ($user_role_project) {

            Log::info($user_role_project->id);

            DB::table('project_role_user')
                ->where('id', $user_role_project->id)
                ->update($user_role_project->toArray());

        });

    }
}
