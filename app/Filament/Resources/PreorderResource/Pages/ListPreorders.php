<?php

namespace App\Filament\Resources\PreorderResource\Pages;

use App\Filament\Resources\PreorderResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPreorders extends ListRecords
{
    protected static string $resource = PreorderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
