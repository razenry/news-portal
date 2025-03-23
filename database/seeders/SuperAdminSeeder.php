<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; // Pastikan sesuai dengan package Shield yang kamu gunakan
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class SuperAdminSeeder extends Seeder
{
    public function run()
    {
        // Buat super admin jika belum ada
        $superAdmin = User::firstOrCreate(
            ['email' => 'superadmin@example.com'], // Ganti dengan email yang kamu mau
            [
                'name' => 'Super Admin',
                'password' => Hash::make('password123'), // Ganti dengan password yang lebih aman
            ]
        );

        // Pastikan role super_admin ada
        $role = Role::firstOrCreate(
            ['name' => 'super_admin'],
            ['guard_name' => 'web']
        );

        // Beri role super_admin ke user
        $superAdmin->assignRole($role);

        // Beri semua permission ke super_admin
        $role->syncPermissions(\Spatie\Permission\Models\Permission::all());
    }
}

