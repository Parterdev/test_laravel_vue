<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Generamos 10 products y por cada uno descargamos una imagen
        $products = Product::factory(10)->create();

        //Iteramos cada product
        foreach($products as $product) {
            /** Llamamos al ImageFactory,
             * le pasamos el dato de id del modelo Product asi como tambien 
             * el su entidad logica
             */
            Image::factory(1)->create([
                'imageable_id'   => $product->id,
                'imageable_type' => Product::class,
            ]);
        }
    }
}
