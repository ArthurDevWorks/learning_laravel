<?php

namespace Database\Factories;

use App\Models\User;
use Faker\Core\DateTime;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'uuid' => Str::orderedUuid(),
            'user_id' => User::factory(),
            'document' => fake('pt_BR')->cpf,
            'birthdate' => fake()->dateTimeThisCentury()
        ];
    }
}
