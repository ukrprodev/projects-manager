<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\ProjectUser;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = collect([
            ['name' => 'Admin'], // 1
            ['name' => 'Adam'], // 2
            ['name' => 'Tyler'], // 3
            ['name' => 'Stuart'], // 4
            ['name' => 'Lan'], // 5
        ]);

        $projects = collect([
            [
                'title' => 'Angular Update',
                'owner_id' => 1,
                'members' => [4, 5],
                'tasks' => [
                    [
                        'created_by_id' => 1,
                        'assignee_id' => 5,
                        'task' => 'Upgrade Angular',
                        'estimated_hours' => 15,
                    ],
                    [
                        'created_by_id' => 1,
                        'assignee_id' => 5,
                        'task' => 'Test',
                        'estimated_hours' => 10,
                    ],
                    [
                        'created_by_id' => 1,
                        'assignee_id' => 4,
                        'task' => 'Fix Broken Things',
                        'estimated_hours' => 10,
                    ],
                ],
            ],
            [
                'title' => 'Websocket Updates',
                'owner_id' => 1,
                'members' => [4],
                'tasks' => [
                    [
                        'created_by_id' => 1,
                        'assignee_id' => 5,
                        'task' => 'Add to Socket.IO',
                        'estimated_hours' => 2,
                    ],
                    [
                        'created_by_id' => 1,
                        'assignee_id' => 5,
                        'task' => 'Enable Broadcasting',
                        'estimated_hours' => 5,
                    ],
                    [
                        'created_by_id' => 1,
                        'assignee_id' => 4,
                        'task' => 'Adjust Interface',
                        'estimated_hours' => 3,
                    ],
                ],
            ],
            [
                'title' => 'E-Commerce Website',
                'owner_id' => 1,
                'members' => [2, 3],
                'tasks' => [
                    [
                        'created_by_id' => 1,
                        'assignee_id' => 2,
                        'task' => 'Product Pages',
                        'estimated_hours' => 5,
                    ],
                    [
                        'created_by_id' => 1,
                        'assignee_id' => 2,
                        'task' => 'Shopping Cart',
                        'estimated_hours' => 5,
                    ],
                    [
                        'created_by_id' => 1,
                        'assignee_id' => 3,
                        'task' => 'My Account',
                        'estimated_hours' => 10,
                    ],
                ],
            ],
        ]);

        $users->each(fn($user) => User::query()->create($user));

        $projects->each(function ($projectData) {
            /** @var Project|array $project */
            $project = Project::query()->create([
                'title' => $projectData['title'],
                'owner_id' => $projectData['owner_id'],
            ]);

            foreach ($projectData['tasks'] as $task) {
                $project->tasks()->create($task);
            }

            foreach ($projectData['members'] as $member) {
                ProjectUser::query()->create([
                    'user_id' => $member,
                    'project_id' => $project->id,
                ]);
            }
        });
    }
}
