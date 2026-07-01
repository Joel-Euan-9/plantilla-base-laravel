<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $roleSuperAdmin = Role::create(['name' => 'Super Admin']);
        $roleAlcalde = Role::create(['name' => 'Presidente Municipal']);
        $roleDirector = Role::create(['name' => 'Director de Area']);
        $roleEmpleado = Role::create(['name' => 'Empleado Operativo']);

        $admin = User::create([
            'name' => 'Administrador',
            'email' => 'joeleuan2@gmail.com', 
            'password' => Hash::make('password123'),
            'is_active' => true,
        ]);

        $admin->assignRole($roleSuperAdmin);

        $empleado = User::create([
            'name' => 'Empleado',
            'email' => 'practicaredesupp@gmail.com',
            'password' => Hash::make('password123'),
            'is_active' => true,
        ]);
        $empleado->assignRole($roleEmpleado);
    }
}
