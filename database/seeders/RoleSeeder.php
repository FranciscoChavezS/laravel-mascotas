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
        $role1 = Role::create(['name' => 'Admin']); //creamos role para administrador
        $role2 = Role::create(['name' => 'Usuario']);//creamos role para usuario
        
        /*Con syncRole() estamos asignandole un role a un permiso en caso de que sea uno o varios roles
        que se asiganaran*/
        Permission::create(['name' => 'home'])->syncRoles([$role1,$role2]); 

        //asignando roles para usuarios
        Permission::create(['name' => 'users.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'users.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'users.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'users.show'])->syncRoles([$role1]);
        Permission::create(['name' => 'users.update'])->syncRoles([$role1]);
        Permission::create(['name' => 'users.destroy'])->syncRoles([$role1]);

        //Asignando roles para los permisos
        Permission::create(['name' => 'permissions.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'permissions.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'permissions.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'permissions.show'])->syncRoles([$role1]);
        Permission::create(['name' => 'permissions.update'])->syncRoles([$role1]);
        Permission::create(['name' => 'permissions.destroy'])->syncRoles([$role1]);

        //Asignando roles para roles
        Permission::create(['name' => 'roles.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'roles.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'roles.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'roles.show'])->syncRoles([$role1]);
        Permission::create(['name' => 'roles.update'])->syncRoles([$role1]);
        Permission::create(['name' => 'roles.destroy'])->syncRoles([$role1]);

        //Asignando roles para posts
        Permission::create(['name' => 'posts.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'posts.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'posts.edit'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'posts.show'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'posts.update'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'posts.delete'])->syncRoles([$role1, $role2]);

         //asignando roles para Carga de Archivos
         Permission::create(['name' => 'archivo.index'])->syncRoles([$role1,$role2]);
         Permission::create(['name' => 'archivo.create'])->syncRoles([$role1,$role2]);
         Permission::create(['name' => 'archivo.edit'])->syncRoles([$role1]);
         Permission::create(['name' => 'archivo.show'])->syncRoles([$role1,$role2]);
         Permission::create(['name' => 'archivo.update'])->syncRoles([$role1]);
         Permission::create(['name' => 'archivo.destroy'])->syncRoles([$role1]);

         //Asignando roles para Productos
        Permission::create(['name' => 'products.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'products.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'products.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'products.show'])->syncRoles([$role1]);
        Permission::create(['name' => 'products.update'])->syncRoles([$role1]);
        Permission::create(['name' => 'products.delete'])->syncRoles([$role1]);
    }
}
