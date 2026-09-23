<?php

namespace App\Filament\Resources\nos\Pages;

use App\Filament\Resources\nos\noResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class Listnos extends ListRecords
{
    protected static string $resource = noResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
