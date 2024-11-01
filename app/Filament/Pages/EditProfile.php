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
                ->visibility('public')
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
    // Start with the current profile picture path
    $profilePicturePath = auth()->user()->profile_picture;

    // Check if a new profile picture is uploaded
    if ($this->profile_picture) {
        // Ensure we are working with an uploaded file
        if (is_array($this->profile_picture)) {
            // Retrieve the file from the array
            $uploadedFile = reset($this->profile_picture); // Gets the first file object from the array
        } else {
            // If not an array, it should be the file object directly
            $uploadedFile = $this->profile_picture;
        }

        // Check if we have a valid uploaded file object
        if ($uploadedFile instanceof \Illuminate\Http\UploadedFile) {
            // Store the file and update the profile picture path
            $profilePicturePath = $uploadedFile->store('profile-user', 'public');
        }
    }

    // Update user profile with the new data
    auth()->user()->update([
        'name' => $this->name,
        'profile_picture' => $profilePicturePath,
        'faculty' => $this->faculty,
        'instagram' => $this->instagram,
    ]);

    // Show a success notification
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
