<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Department::create([
            'name' => 'IT',
            'description' => 'Information Technology',
        ]);

        Department::create([
            'name' => 'Pantry',
            'description' => 'Pantry Department',
        ]);
    }
}