<?php

namespace App\Filament\Admin\Resources\CakeResource\Pages;

use App\Filament\Admin\Resources\CakeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCake extends EditRecord
{
    protected static string $resource = CakeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
