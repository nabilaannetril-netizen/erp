<?php

namespace App\Filament\Resources\nos\Pages;

use App\Filament\Resources\nos\noResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class Editno extends EditRecord
{
    protected static string $resource = noResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
