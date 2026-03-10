<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Administrador',
            'email' => 'yilber@admin.com',
            'password' => bcrypt('12345678'),
        ]);

        $admin->assignRole('admin');

        // Editor
        $editor = User::create([
            'name' => 'Editor',
            'email' => 'yilber@editor.com',
            'password' => bcrypt('12345678'),
        ]);

        $editor->assignRole('editor');

        // Usuario normal
        $user = User::create([
            'name' => 'Usuario',
            'email' => 'yilber@user.com',
            'password' => bcrypt('12345678'),
        ]);

        $user->assignRole('user');
    }
}
