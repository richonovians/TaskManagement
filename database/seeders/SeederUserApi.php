<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use PhpParser\Node\Expr\Assign;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class SeederUserApi extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   
        // reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        
        // Create Permissions
        $permissions = [
            'lihat Task',
            'buat Task',
            'ubah Task',
            'hapus Task',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        $superman = User::create([
            'name' => 'Superman',
            'email' => 'superman123@gmail.com',
            'password' => Hash::make('123'),
        ]);

        $penghunigoa = User::create([
            'name' => 'Penghuni Goa',
            'email' => 'penghunigoa123@gmail.com',
            'password' => Hash::make('123'),
        ]);
        
        // Create roles and assign permissions
        $role1 = Role::create(['name' => 'superadmin']);
        $role1->givePermissionTo(Permission::all());

        $role2 = Role::create(['name' => 'penghunigoa']);
        $role2->givePermissionTo(['lihat Task']);

        $superman->assignRole($role1);
        $penghunigoa->assignRole($role2);

    }
}
