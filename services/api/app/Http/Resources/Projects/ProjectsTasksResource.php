<?php

namespace App\Http\Resources\Projects;

use App\Models\ProjectTask;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin ProjectTask
 */
class ProjectsTasksResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'assignee' => new ProjectUserResource($this->assignee),
            'task' => $this->task,
            'estimatedHours' => $this->estimated_hours
        ];
    }
}
