<?php

namespace App\Http\Resources\Projects;

use App\Models\ProjectUser;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Collection;

/**
 * @mixin ProjectUser
 */
class ProjectUsersCollection extends ResourceCollection
{

    public $collects = ProjectUserResource::class;

    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return Collection
     */
    public function toArray(Request $request): Collection
    {
        return $this->collection;
    }
}
