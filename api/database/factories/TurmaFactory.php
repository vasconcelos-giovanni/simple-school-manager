<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Turma;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Turma>
 */
class TurmaFactory extends Factory
{
    protected $model = Turma::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => $this->faker->word,
            'ano' => $this->faker->numberBetween(1, 4),
            'periodo' => $this->faker->randomElement(['matutino', 'vespertino', 'noturno']),
        ];
    }
}
