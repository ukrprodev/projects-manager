<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Projects\ProjectsCollection;
use App\Models\User;

class UserController extends Controller
{
    /**
     * @param User $user
     * @return array[]
     */
    public function projects(User $user): array
    {
        $projectsCollection = new ProjectsCollection($user->projects);

        return [
            'data' => [
                'user' => $user->name,
                ...$projectsCollection->toArray(request())
            ]
        ];
    }
}
