<?php

namespace Database\Seeders;

use App\Models\SkillType;
use Illuminate\Database\Seeder;

class SkillTypeSeeder extends Seeder
{
    public function run(): void
    {
        foreach (['IT', 'Constitution', 'Language'] as $name) {
            SkillType::firstOrCreate([
                'name' => $name,
            ]);
        }
    }
}
