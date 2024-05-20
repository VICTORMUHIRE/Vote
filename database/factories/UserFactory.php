<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Promotion;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->name();
        $password = strtolower(substr($name, 0, 3)) . rand(10000, 99999); // Mot de passe personnalisé
        $promotion = Promotion::inRandomOrder()->first();
        return [
            'name' => $name,
            'email' => fake()->unique()->safeEmail,
            'role'=> 'etudiant',
            'password' => bcrypt($password),
            'promotion_id' => $promotion->id, // Liaison aléatoire à une promotion
            'faculte_id' => $promotion->faculte->id,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return $this
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
