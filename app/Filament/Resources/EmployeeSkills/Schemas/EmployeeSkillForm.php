<?php

namespace App\Filament\Resources\EmployeeSkills\Schemas;

use App\Models\Skill;
use App\Models\SkillLevel;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;

class EmployeeSkillForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Select::make('employee_id')
                ->label('Employee')
                ->relationship('employee', 'name')
                ->searchable()
                ->preload()
                ->required(),

            Select::make('skill_type_id')
                ->label('Skill Type')
                ->relationship('skillType', 'name')
                ->searchable()
                ->preload()
                ->live()
                ->afterStateUpdated(function (Set $set): void {
                    $set('skill_id', null);
                    $set('skill_level_id', null);
                })
                ->required(),

            Select::make('skill_id')
                ->label('Skill')
                ->options(function (Get $get): array {
                    $typeId = $get('skill_type_id');

                    if (blank($typeId)) {
                        return [];
                    }

                    return Skill::query()
                        ->where('skill_type_id', $typeId)
                        ->orderBy('name')
                        ->pluck('name', 'id')
                        ->all();
                })
                ->searchable()
                ->live()
                ->disabled(fn (Get $get): bool =>
                    blank($get('skill_type_id'))
                )
                ->required(),

            Select::make('skill_level_id')
                ->label('Skill Level')
                ->options(function (Get $get): array {
                    $typeId = $get('skill_type_id');

                    if (blank($typeId)) {
                        return [];
                    }

                    return SkillLevel::query()
                        ->where('skill_type_id', $typeId)
                        ->orderBy('name')
                        ->pluck('name', 'id')
                        ->all();
                })
                ->searchable()
                ->disabled(fn (Get $get): bool =>
                    blank($get('skill_type_id'))
                )
                ->required(),

            TextInput::make('level_progress')
                ->label('Progress (%)')
                ->numeric()
                ->minValue(0)
                ->maxValue(100)
                ->default(0)
                ->required(),

            Toggle::make('is_default_level')
                ->label('Default Level')
                ->default(false),

            FileUpload::make('image')
                ->label('Image')
                ->image()
                ->disk('public')
                ->directory('employee-skills')
                ->nullable(),

            DatePicker::make('effective_date')
                ->label('Effective Date')
                ->required(),

            DatePicker::make('expiry_date')
                ->label('Expiry Date')
                ->nullable(),
        ]);
    }
}
