<?php

namespace Database\Seeders;

use App\models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'                  => 'Admincey',
            'email'                 =>'adminceyey@example.com',
            'password'              => bcrypt('password'),
            'email_verified_at'     => now(),
        ]);
    }
}