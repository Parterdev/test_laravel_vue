<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Eliminamos el directorio productImages por cada seed
        Storage::deleteDirectory('public/productImages');
        //Creamos el directorio
        Storage::makeDirectory('public/productImages');
        //Llamamos al seeder de usuario
        $this->call(UserSeeder::class);
        //Llamamos al seeder de product
        $this->call(ProductSeeder::class);
    }
}
