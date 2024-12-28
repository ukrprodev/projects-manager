<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Projects\ProjectsCollection;
use App\Http\Resources\Projects\ProjectsTasksCollection;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{

    /**
     * @param Request $request
     * @return ProjectsCollection
     */
    public function list(Request $request): ProjectsCollection
    {
        $projects = Project::query()
            ->paginate(
                $request->limit ?? 10,
                page: $request->page ?? 1
            );

        return new ProjectsCollection($projects->items());
    }

    /**
     * @param Project $project
     * @return array
     */
    public function tasks(Project $project): array
    {
        $tasksResource = new ProjectsTasksCollection($project->tasks);

        return [
            'data' => [
                'project' => ['title' => $project->title, 'estimatedHours' => $project->estimatedHours],
                ...$tasksResource->toArray(\request())
            ]
        ];
    }
}
