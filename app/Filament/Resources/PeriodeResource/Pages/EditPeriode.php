<?php

namespace App\Filament\Resources\PeriodeResource\Pages;

use App\Filament\Resources\PeriodeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPeriode extends EditRecord
{
    protected static string $resource = PeriodeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
    
}
