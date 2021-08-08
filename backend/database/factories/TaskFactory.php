<?php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Task::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'  => $this->faker->sentence(4),
            'label' => $this->faker->numberBetween(0, 2),
            'status' => $this->faker->boolean(30),
            'date'   => $this->faker->dateTimeAD(),
        ];
    }
}
