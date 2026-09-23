<?php

namespace App\Filament\Resources\nos;

use App\Filament\Resources\nos\Pages\Createno;
use App\Filament\Resources\nos\Pages\Editno;
use App\Filament\Resources\nos\Pages\Listnos;
use App\Filament\Resources\nos\Schemas\noForm;
use App\Filament\Resources\nos\Tables\nosTable;
use App\Models\Department;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class noResource extends Resource
{
    protected static ?string $model = Department::class;

    // Nama yang tampil di sidebar
    protected static ?string $navigationLabel = 'Department';

    // Grup Human Resource
    protected static string|UnitEnum|null $navigationGroup = 'Human Resource';

    // Urutan nomor 3
    protected static ?int $navigationSort = 3;

    protected static ?string $modelLabel = 'Department';

    protected static ?string $pluralModelLabel = 'Departments';

    // Icon folder
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBuildingOffice2;
    public static function form(Schema $schema): Schema
    {
        return noForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return nosTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => Listnos::route('/'),
            'create' => Createno::route('/create'),
            'edit' => Editno::route('/{record}/edit'),
        ];
    }
}