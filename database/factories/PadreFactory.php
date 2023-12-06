<?php

// database/factories/PadreFactory.php

namespace Database\Factories;

use App\Models\Padre;
use Illuminate\Database\Eloquent\Factories\Factory;

class PadreFactory extends Factory
{
    protected $model = Padre::class;

    public function definition()
    {
        return [
            'tipo' => $this->faker->word,
            'primernombre' => $this->faker->firstName,
            'segundonombre' => $this->faker->firstName,
            'primerapellido' => $this->faker->lastName,
            'segundoapellido' => $this->faker->lastName,
            'numerodeidentidad' => $this->faker->unique()->numerify('########'),
            'telefonopersonal' => $this->faker->phoneNumber,
            'lugardetrabajo' => $this->faker->company,
            'oficio' => $this->faker->jobTitle,
            'telefonooficina' => $this->faker->phoneNumber,
            'ingresos' => $this->faker->numberBetween(1000, 10000),
        ];
    }
}
