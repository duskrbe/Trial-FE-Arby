<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RolesAndSuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Buat peran (roles) jika belum ada
        $superAdminRole = Role::firstOrCreate(['name' => 'super_admin', 'guard_name' => 'web']);
        $adminProdiRole = Role::firstOrCreate(['name' => 'admin_prodi', 'guard_name' => 'web']);

        // 2. Buat user Super Admin pertama jika belum ada
        $superAdminUser = User::firstOrCreate(
            ['email' => 'superadmin@example.com'], // Cek berdasarkan email
            [
                'name' => 'Super Admin',
                'password' => Hash::make('password'), // Ganti 'password' dengan password yang kuat
                'email_verified_at' => now(),
                'prodi_id' => null, // Super Admin tidak terkait dengan prodi tertentu
            ]
        );

        // Berikan peran 'super_admin' kepada user yang dibuat
        if (!$superAdminUser->hasRole('super_admin')) {
            $superAdminUser->assignRole('super_admin');
        }

        $this->command->info('Peran `super_admin` dan `admin_prodi` telah dibuat.');
        $this->command->info('User Super Admin: superadmin@example.com dengan password: password (segera ganti!).');
    }
}
