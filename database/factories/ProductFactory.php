<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        //Almacenamos el nombre en una variable
        $name = $this->faker->unique()->word(10);
        return [
            //Definimos los campos para crear datos falsos
            'name' => $name,
            'slug' => Str::slug($name),
            'code' => $this->faker->unique()->word(4),
        ];
    }
}
