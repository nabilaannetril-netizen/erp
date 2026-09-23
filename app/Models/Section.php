<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['name', 'department_id'])]
class Section extends Model
{
    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }
}