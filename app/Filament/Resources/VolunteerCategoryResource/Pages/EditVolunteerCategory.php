<?php

namespace App\Filament\Resources\VolunteerCategoryResource\Pages;

use App\Filament\Resources\VolunteerCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditVolunteerCategory extends EditRecord
{
    protected static string $resource = VolunteerCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
