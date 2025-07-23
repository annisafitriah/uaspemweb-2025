<?php

namespace App\Filament\Admin\Resources\CakeResource\Pages;

use App\Filament\Admin\Resources\CakeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCakes extends ListRecords
{
    protected static string $resource = CakeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
