<?php

namespace App\Filament\Resources\Employees\Schemas;

use App\Models\Department;
use App\Models\Position;
use App\Models\User;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class EmployeeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Employee Information')
                    ->schema([

                        FileUpload::make('image')
                            ->label('Profile Photo')
                            ->image()
                            ->disk('public')
                            ->directory('employees')
                            ->imageEditor()
                            ->circleCropper()
                            ->maxSize(2048),

                        Select::make('user_id')
                            ->label('User')
                            ->options(
                                User::query()
                                    ->pluck('name', 'id')
                                    ->toArray()
                            )
                            ->searchable()
                            ->preload()
                            ->required(),

                        TextInput::make('name')
                            ->label('Name')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('email')
                            ->label('Email')
                            ->email()
                            ->maxLength(255),

                        TextInput::make('phone_number')
                            ->label('Phone Number')
                            ->tel()
                            ->maxLength(255),

                        TextInput::make('address')
                            ->label('Address')
                            ->maxLength(255),

                        Select::make('department_id')
                            ->label('Department')
                            ->options(
                                Department::query()
                                    ->pluck('name', 'id')
                                    ->toArray()
                            )
                            ->searchable()
                            ->preload()
                            ->required(),

                        Select::make('position_id')
                            ->label('Position')
                            ->options(
                                Position::query()
                                    ->pluck('name', 'id')
                                    ->toArray()
                            )
                            ->searchable()
                            ->preload()
                            ->required(),

                        TextInput::make('place_of_birth')
                            ->label('Place of Birth')
                            ->maxLength(255),

                        DatePicker::make('date_of_birth')
                            ->label('Date of Birth'),

                        Select::make('gender')
                            ->label('Gender')
                            ->options([
                                'male' => 'Male',
                                'female' => 'Female',
                            ]),

                        Select::make('religion')
                            ->label('Religion')
                            ->options([
                                'muslim' => 'Muslim',
                                'christian' => 'Christian',
                                'catholic' => 'Catholic',
                                'hindu' => 'Hindu',
                                'buddha' => 'Buddha',
                            ]),

                        TextInput::make('salary')
                            ->label('Salary')
                            ->numeric()
                            ->prefix('Rp'),

                        DatePicker::make('start_date')
                            ->label('Start Date'),

                        DatePicker::make('end_date')
                            ->label('End Date'),

                        Select::make('status')
                            ->label('Status')
                            ->options([
                                'applicant' => 'Applicant',
                                'active' => 'Active',
                                'trainee' => 'Trainee',
                                'x' => 'X',
                            ])
                            ->default('active')
                            ->required(),

                    ])
                    ->columns(2),
            ]);
    }
}