<?php

namespace Database\Factories;

use App\Models\Lectura_Item_Meteo;
use Illuminate\Database\Eloquent\Factories\Factory;

class Lectura_Item_MeteoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Definición predeterminada para el primer tipo de respuesta
        return [
            'idLugar' => $this->faker->unique()->randomElement(['20018','48017','48020','20029','20069','20030','20045','20071']),
            'fecha_hora' => $this->faker->unique()->dateTimeBetween('-1 month', '+1 month'),
            'valorTemp' => $this->faker->randomFloat(2, 10, 20),
            'valorHumedad' => $this->faker->randomFloat(2, 1, 10),
            'valorViento' => $this->faker->randomFloat(2,1,10),
            'prevision' => $this->faker->randomElement(['Soleado','Nublado','Lluvia','Nieve']),
        ];
    }

    /**
     * Define the "now" state for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function now(): Factory
    {
        // Definición para el segundo tipo de respuesta
        return $this->state(function (array $attributes) {
            return [
                'fecha_hora' => now(),
            ];
        });
    }
}
