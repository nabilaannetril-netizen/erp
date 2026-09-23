<?php

namespace App\Filament\Resources\Attendances\Schemas;

use App\Models\Employee;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TimePicker;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class AttendanceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Attendance Information')
                    ->schema([
                        Select::make('employee_id')
                            ->label('Employee')
                            ->options(
                                Employee::query()
                                    ->orderBy('name')
                                    ->pluck('name', 'id')
                                    ->toArray()
                            )
                            ->searchable()
                            ->preload()
                            ->required(),

                        DatePicker::make('date')
                            ->label('Date')
                            ->required()
                            ->default(now()),

                        TimePicker::make('check_in')
                            ->label('Check In')
                            ->seconds(true),

                        TimePicker::make('check_out')
                            ->label('Check Out')
                            ->seconds(true),

                        Select::make('status')
                            ->label('Status')
                            ->options([
                                'present' => 'Present',
                                'late' => 'Late',
                                'permission' => 'Permission',
                                'sick' => 'Sick',
                                'absent' => 'Absent',
                            ])
                            ->default('present')
                            ->required(),

                        Textarea::make('notes')
                            ->label('Notes')
                            ->rows(3)
                            ->placeholder('Tambahkan catatan jika diperlukan...')
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
            ]);
    }
}