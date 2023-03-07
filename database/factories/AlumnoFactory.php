<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Alumno;
use Carbon\Carbon;

class AlumnoFactory extends Factory
{
    protected $model = Alumno::class;

    public function definition()
    {
        return [
            'primernombre' => $this->faker->firstName(),
            'segundonombre' => $this->faker->firstName(),
            'primerapellido' => $this->faker->lastName(),
            'segundoapellido' => $this->faker->lastName(),
            'numerodeidentidad' => $this->faker->unique()->randomNumber(9),
            'fechadenacimiento' => $this->faker->dateTimeBetween('-20 years', 'now')->format('Y-m-d'),
            'genero' => $this->faker->randomElement(['Masculino', 'Femenino']),
            'lugardenacimiento' => $this->faker->city(),
            'direccion' => $this->faker->address(),
            'numerodehermanosenicgc' => $this->faker->randomNumber(5),
            'telefonodeencargado' => $this->faker->phoneNumber(),
            'alergia' => $this->faker->randomElement(['Ninguna', 'Polvo', 'Mariscos', 'Mani']),
            'created_at' => Carbon::now(),
        ];
    }
}