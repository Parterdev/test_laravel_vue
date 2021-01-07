<?php

namespace Database\Factories;

use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Image::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            /**Definimos el campo a ser llenado con datos de prueba
             * Pasamos el path de imagenes, ancho, alto, categoria 
             * y la forma de almacenamiento (image1.ext) concatenando el prefijo productImages
             */
            'url' => 'productImages/' . $this->faker->image('public/storage/productImages', 640, 480, null, false)
        ];
    }
}
