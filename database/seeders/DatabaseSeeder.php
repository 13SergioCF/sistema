<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $role1=Role::create(['name'=>'Administrador']);
        $role2=Role::create(['name'=>'Cliente']);
        Permission::create(['name'=> 'usuario'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=> 'usuario.editar'])->syncRoles([$role1]);
        Permission::create(['name'=> 'usuario.eliminar'])->syncRoles([$role1]);
        Permission::create(['name'=> 'usuario.agregar'])->syncRoles([$role1]);
        Permission::create(['name'=> 'usuario.eliminados'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=> 'usuario.restore'])->syncRoles([$role1]);
        
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123'),
        ])->assignRole('Administrador');

        User::create([
            'name' => 'cliente1',
            'email' => 'cliente1@gmail.com',
            'password' => Hash::make('123'),
        ])->assignRole('Cliente');

       // User::factory(20000)->create();
    }
}
