<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

/**
 * @property int $id
 * @property int $owner_id
 * @property string $title
 *
 * @property int $estimatedHours
 * @property ProjectTask[]|HasMany $tasks
 * @property ProjectUser[]|HasMany $members
 */
class Project extends Model
{
    protected $guarded = [
        'id'
    ];

    /**
     * @return HasMany
     */
    public function tasks(): HasMany
    {
        return $this->hasMany(ProjectTask::class, 'project_id');
    }

    /**
     * @return HasManyThrough
     */
    public function members(): HasManyThrough
    {
        return $this->hasManyThrough(
            User::class,
            ProjectUser::class,
            'project_id',
            'id',
            'id',
            'user_id'
        );
    }

    /**
     * @return Attribute
     */
    public function estimatedHours(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->tasks()->sum('estimated_hours')
        );
    }
}
