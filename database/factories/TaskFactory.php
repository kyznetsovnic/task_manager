<?php

namespace Database\Factories;

use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->getTitle(),
            'description' => $this->getDescription(),
            'status' => Task::TASK_NEW,
            'expiration_at' => Carbon::createFromFormat('!Y-m-d', '2024-09-05'),
        ];
    }

    private function getTitle(): string
    {
        return $this->faker->unique()->randomElement([
            'Task about IT',
            'Task about Management',
        ]);
    }

    private function getDescription(): string
    {
        return $this->faker->unique()->randomElement([
            'You should to do some like this',
            'You should to do some like that',
        ]);
    }
}
