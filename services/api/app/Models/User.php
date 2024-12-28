<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

/**
 * @property int $id
 * @property string $name
 *
 * @property HasManyThrough|Project[] $projects
 * @property HasMany|ProjectTask[] $tasks
 */
class User extends Model
{
    protected $guarded = [
        'id'
    ];

    public function projects(): HasManyThrough
    {
        return $this->hasManyThrough(
            Project::class,
            ProjectUser::class,
            'user_id',
            'id',
            'id',
            'project_id'
        );
    }

    public function tasks(): HasMany
    {
        return $this->hasMany(ProjectTask::class);
    }
}
