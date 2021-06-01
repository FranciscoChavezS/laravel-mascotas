<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Asignar roles y permisos
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Usuario']);
        
        Permission::create(['name' => 'home'])->syncRoles([$role1,$role2]);

        Permission::create(['name' => 'users.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'users.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'users.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'users.show'])->syncRoles([$role1]);
        Permission::create(['name' => 'users.update'])->syncRoles([$role1]);
        Permission::create(['name' => 'users.destroy'])->syncRoles([$role1]);

        Permission::create(['name' => 'posts.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'posts.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'posts.edit'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'posts.show'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'posts.update'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'posts.delete'])->syncRoles([$role1]);

    }
}
