<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EmployeeSkill extends Model
{
    protected $fillable = [
        'employee_id',
        'skill_type_id',
        'skill_id',
        'skill_level_id',
        'level_progress',
        'is_default_level',
        'image',
        'effective_date',
        'expiry_date',
    ];

    protected function casts(): array
    {
        return [
            'level_progress' => 'integer',
            'is_default_level' => 'boolean',
            'effective_date' => 'date',
            'expiry_date' => 'date',
        ];
    }

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }

    public function skillType(): BelongsTo
    {
        return $this->belongsTo(SkillType::class);
    }

    public function skill(): BelongsTo
    {
        return $this->belongsTo(Skill::class);
    }

    public function skillLevel(): BelongsTo
    {
        return $this->belongsTo(SkillLevel::class);
    }
}
