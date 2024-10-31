<?php

namespace App\Filament\Resources\VolunteerCategoryResource\Pages;

use App\Filament\Resources\VolunteerCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListVolunteerCategories extends ListRecords
{
    protected static string $resource = VolunteerCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
