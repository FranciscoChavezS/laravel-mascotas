<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Creamos un registro user para asignarle un rol de administrador
        User::create([
            'name' => 'Francisco',
            'username' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('gringochivas123')
        ])->assignRole('Admin');

        //User::factory(9)->create();
    }
}
