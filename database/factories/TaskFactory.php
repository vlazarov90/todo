<?php


namespace Database\Factories;


use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TaskFactory extends Factory
{
    protected $model = Task::class;

    public function definition()
    {
        return [
            'text' => Str::random(100),
            'completed' => mt_rand(0, 1)
        ];
    }
}
