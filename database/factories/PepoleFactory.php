<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pepole>
 */
class PepoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * 
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //

            'name' => $this->faker->name(),
            'mobaile' => $this->faker->phoneNumber(),
            'phone' => $this->faker->e164PhoneNumber(),
            'identification_number' => $this->faker->ean8,
            'apartment_number' => $this->faker->numberBetween($min = 1 and $max = 10),
            'floor_number' => $this->faker->numberBetween($min = 1 and $max = 10),
            'family_members' => $this->faker->numberBetween($min = 1 and $max = 7),



        ];
    }
}
