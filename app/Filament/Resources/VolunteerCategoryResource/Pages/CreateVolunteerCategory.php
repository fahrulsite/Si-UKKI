<?php

namespace App\Filament\Resources\VolunteerCategoryResource\Pages;

use App\Filament\Resources\VolunteerCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateVolunteerCategory extends CreateRecord
{
    protected static string $resource = VolunteerCategoryResource::class;
    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }    
}
