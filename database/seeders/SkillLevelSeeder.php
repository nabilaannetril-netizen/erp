<?php

namespace Database\Seeders;

use App\Models\SkillLevel;
use App\Models\SkillType;
use Illuminate\Database\Seeder;

class SkillLevelSeeder extends Seeder
{
    public function run(): void
    {
        $levels = [
            'Beginner',
            'Intermediate',
            'Advanced',
        ];

        $skillTypes = SkillType::all();

        foreach ($skillTypes as $skillType) {
            foreach ($levels as $level) {
                SkillLevel::firstOrCreate([
                    'skill_type_id' => $skillType->id,
                    'name' => $level,
                ]);
            }
        }
    }
}
