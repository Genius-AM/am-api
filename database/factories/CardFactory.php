<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Card>
 */
class CardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $id_desk = array('1', '2', '3', '4', '5', '6');

        return [
            'name' => $this->faker->jobTitle(),
            'desk_list_id' => $this->$id_desk,
        ];
    }
}
