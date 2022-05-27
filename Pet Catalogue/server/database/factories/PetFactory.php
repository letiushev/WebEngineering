<?php

namespace Database\Factories;

use App\Models\Pet;
use Illuminate\Database\Eloquent\Factories\Factory;

class PetFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pet::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=> $this->faker->name(),
            'species'=> $this->faker->word(),
            'birth'=> $this->faker->date($format = 'Y-m-d', $max = 'now'),
            //'death'=> $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'note'=> $this->faker->sentence(),
            'status'=> $this->faker->randomElement(['LIVING', 'DEAD']),
        ];
    }
}
