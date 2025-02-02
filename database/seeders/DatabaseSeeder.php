<?php

namespace Database\Seeders;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
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
        // Create permissions
        $permissions = [
            'super_admin',
            'administrador',
            'contratista',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Create roles
        $role = Role::create(['name' => 'Super_admin']);
        $roleAdmin = Role::create(['name' => 'Admin']);
        $roleContratista = Role::create(['name' => 'Contratista']);

        // Assign permissions to roles
        $role->syncPermissions(Permission::all());
        $roleAdmin->givePermissionTo('administrador');
        $roleContratista->givePermissionTo('contratista');

        // Create user
        $user = User::create([
            'name' => 'admin',
            'last_name' => 'admin',
            'email' => 'admin@sena.edu.co',
            'password' => bcrypt('Admin12345*')
        ]);

        // Assign role to user
        $user->assignRole($role);
    }



    /**
     * Create a permission if it does not already exist.
     *
     * @param string $name
     * @param string $guardName
     * @return void
     */
    protected function createPermission(string $name, string $guardName)
    {
        if (Permission::where('name', $name)->where('guard_name', $guardName)->doesntExist()) {
            Permission::create([
                'name' => $name,
                'guard_name' => $guardName,
            ]);
        }
    }
}
