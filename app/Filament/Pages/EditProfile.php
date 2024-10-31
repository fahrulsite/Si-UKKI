<?php

namespace App\Filament\Pages;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Pages\Page;
use Filament\Pages\Actions\ButtonAction;
use Filament\Notifications\Notification;

class EditProfile extends Page
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-c-user';
    protected static string $view = 'filament.pages.edit-profile';
    protected static ?string $navigationGroup = 'Setting';

    public $name;
    public $profile_picture;
    public $faculty;
    public $instagram;

    public function mount(): void 
    {
        $this->form->fill([
            'name' => auth()->user()->name,
            'profile_picture' => auth()->user()->profile_picture,
            'faculty' => auth()->user()->faculty, // Ensures faculty is populated
            'instagram' => auth()->user()->instagram,
        ]);
    }

    protected function getFormSchema(): array
    {
        return [
            TextInput::make('name')
                ->label('Name')
                ->required(),
                
            FileUpload::make('profile_picture')
                ->label('Profile Picture')
                ->image()
                ->nullable()
                ->directory('profile-user'),

            Select::make('faculty')
                ->label('Faculty')
                ->options([
                    'FT' => 'FT',
                    'FE' => 'FE',
                    'FBS' => 'FBS',
                    'FIK' => 'FIK',
                    'FMIPA' => 'FMIPA',
                    'FIP' => 'FIP',
                    'FISHIPOL' => 'FISHIPOL',
                    'FK' => 'FK',
                    'FV' => 'FV',
                ])
                ->required(),
            
            TextInput::make('instagram')
                ->label('Username Instagram')
                ->required(),
        ];
    }

    public function submit()
    {
        auth()->user()->update([
            'name' => $this->name,
            'profile_picture' => $this->profile_picture,
            'faculty' => $this->faculty,
            'instagram' => $this->instagram,
        ]);

        Notification::make()
            ->title('Profile updated successfully')
            ->success()
            ->send();
    }

    protected function getActions(): array
    {
        return [
            ButtonAction::make('save')
                ->label('Update Profile')
                ->action('submit')
                ->button()
                ->color('primary'),
        ];
    }
}
