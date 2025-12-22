<?php

namespace App\Filament\Resources\PreorderResource\Pages;

use App\Filament\Resources\PreorderResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPreorder extends EditRecord
{
    protected static string $resource = PreorderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
