<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
//use App\Models\SiteContato;
//use Faker\Generator as Faker;

class SiteContatoFactory extends Factory
{
    /**
     * Define the model's default state.
     *k
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->name,
            'telefone' => $this->faker->tollFreePhoneNumber,
            'email' => $this->faker->unique()->email,
            'motivo_contatos_id' => $this->faker->numberBetween(1, 3),
            'mensagem' => $this->faker->text()
        ];
    }
}
