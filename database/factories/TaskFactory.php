<?php

namespace Database\Factories;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    protected $model = Task::class;

    public function definition()
    {
        return [
            'name' => $this->faker->sentence(3),
            'due_date' => $this->faker->dateTimeBetween('now', '+1 month'),
            'description' => $this->faker->paragraph,
            'status' => $this->faker->randomElement(['to-do', 'in progress', 'done']),
            'priority' => $this->faker->randomElement(['low', 'medium', 'high']),
        ];
    }
}
