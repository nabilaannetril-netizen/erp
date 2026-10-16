<?php

namespace App\Filament\Resources\EmployeeSkills\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class EmployeeSkillsTable
{
    public static function configure(Table $table): Table
    {
        return $table           
->columns([
    TextColumn::make('employee.name')
        ->label('Nama Karyawan')
        ->searchable()
        ->sortable(),

    TextColumn::make('skillType.name')
        ->label('Kategori Skill')
        ->searchable()
        ->sortable(),

    TextColumn::make('skill.name')
        ->label('Skill')
        ->searchable()
        ->sortable(),

    TextColumn::make('skillLevel.name')
        ->label('Level Skill')
        ->searchable()
        ->sortable(),

    TextColumn::make('level_progress')
        ->label('Level Progress')
        ->numeric()
        ->sortable(),

    IconColumn::make('is_default_level')
        ->label('Is Default Level')
        ->boolean()
        ->trueIcon('heroicon-o-check-circle')
        ->falseIcon('heroicon-o-x-circle')
        ->trueColor('success')
        ->falseColor('danger'),

    ImageColumn::make('image')
        ->label('Image'),

    TextColumn::make('effective_date')
        ->label('Effective Date')
        ->date()
        ->sortable(),

    TextColumn::make('expiry_date')
        ->label('Expiry Date')
        ->date()
        ->sortable(),

    TextColumn::make('created_at')
        ->label('Created At')
        ->dateTime()
        ->sortable()
        ->toggleable(isToggledHiddenByDefault: true),

    TextColumn::make('updated_at')
        ->label('Updated At')
        ->dateTime()
        ->sortable()
        ->toggleable(isToggledHiddenByDefault: true),
])

            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
