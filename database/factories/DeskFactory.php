<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class DeskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $user_id = array('1', '2', '3', '4', '5', '6');

        foreach ($user_id as $user){
            return [
                'name' => $this->faker->name(),
                'user_id' => $this->faker->$user
        ];
        }
    }
}
