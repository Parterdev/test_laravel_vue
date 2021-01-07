<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
//Inyectamos los modelos
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Creamos un usuario por default (manualmente)
        User::create([
            'name'         => 'Paúl Terán',
            'email'        => 'my@admin.com',
            'password'     => bcrypt('12345678'),
        ]);

        //Creamos los registros de usuarios falsos
        User::factory(2)->create();
    }
}
