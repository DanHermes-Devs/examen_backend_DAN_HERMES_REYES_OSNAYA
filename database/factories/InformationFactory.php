<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class InformationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => function () {
                return User::factory()->create()->id;
            },
            'direccion' => $this->faker->address,
            'telefono' => $this->faker->phoneNumber,
            'fecha_nacimiento' => $this->faker->date()
        ];
    }
}
