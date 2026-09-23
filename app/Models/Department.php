<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['name', 'description', 'address', 'email', 'phone_number'])]
class Department extends Model
{
    public function sections(): HasMany
    {
        return $this->hasMany(Section::class);
    }
}