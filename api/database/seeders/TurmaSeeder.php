<?php

namespace Database\Seeders;

use App\Models\Turma;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TurmaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::transaction(function () {
            $predefinedValues = [
                [
                    'nome' => 'Informática 1M',
                    'ano' => 1,
                    'periodo' => 'matutino',
                ],
                [
                    'nome' => 'Eletrotécnica 1V',
                    'ano' => 3,
                    'periodo' => 'vespertino',
                ],
                [
                    'nome' => 'Vestuário 1N',
                    'ano' => 1,
                    'periodo' => 'noturno',
                ],
                [
                    'nome' => 'Informática 2M',
                    'ano' => 3,
                    'periodo' => 'matutino',
                ],
                [
                    'nome' => 'Têxtil 1V',
                    'ano' => 2,
                    'periodo' => 'vespertino',
                ]
            ];

            Turma::factory()
                ->count(5)
                ->state(new Sequence(...$predefinedValues))
                ->create();
        });
    }
}
