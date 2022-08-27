<?php

namespace Database\Factories\Info;

use Illuminate\Database\Eloquent\Factories\Factory;


class InfoFactory extends Factory
{

    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'tel' => $this->faker->unique()->phoneNumber(),
        ];
    }
}
