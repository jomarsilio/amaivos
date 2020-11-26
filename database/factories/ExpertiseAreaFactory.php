<?php

namespace Database\Factories;

use App\Models\ExpertiseArea;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExpertiseAreaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ExpertiseArea::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'active' => $this->faker->boolean(70),
        ];
    }
}
