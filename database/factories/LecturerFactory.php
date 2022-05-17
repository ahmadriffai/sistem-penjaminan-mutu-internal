<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lecturer>
 */
class LecturerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nidn' => $this->faker->unique()->randomDigit(),
            'name' => $this->faker->name(),
            'address' => $this->faker->address(),
            'phone' => $this->faker->phoneNumber(),
            'birthday' => time(),
            'imageUrl' => 'http://image.jpg',
            'gender' => 'M',
            'major' => 'Ilmu Politik',
            'user_id' => null
        ];
    }
}
