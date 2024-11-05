<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VolunteerResource\Pages;
use App\Filament\Resources\VolunteerResource\RelationManagers;
use App\Models\Volunteer;
use Filament\Forms;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VolunteerResource extends Resource
{
    protected static ?string $model = Volunteer::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Kepanitiaan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                ->schema([
                    Forms\Components\TextInput::make('title')
                    ->label('Judul')    
                    ->unique(ignoreRecord:true)
                    ->required()
                    ->maxLength(255),
                RichEditor::make('body')
                    ->label('isi')
                    ->required()
                    ->columnSpanFull(),
                ])->columnSpan(2),

                Section::make()
                ->schema([
                    Forms\Components\FileUpload::make('image')
                    ->required()
                    ->label('Pamflet')
                    ->image()
                    ->directory('volunteering-image'),

                    Forms\Components\DateTimePicker::make('date')
                    ->label('Waktu Pelaksanaan')   
                    ->required(),

                    Forms\Components\Select::make('volunteer_category_id')
                    ->label('Kategori')
                    ->relationship('volunteerCategory', 'name')
                    ->multiple()
                    ->preload()
                    ->required()
                    ->searchable(),

                    Forms\Components\TextInput::make('url')
                    ->label('Link Pendaftaran')   
                    ->required()
                    ->maxLength(255),               
                    
                    Forms\Components\Toggle::make('status')
                    ->label("Dibuka")
                    ->required(),
                ])->columnSpan(1),                
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                ->label("Sampul"),
                Tables\Columns\TextColumn::make('title')
                    ->label("Nama Kegiatan")
                    ->searchable(),
                Tables\Columns\TextColumn::make('closed_at')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->label("Penyelenggara")
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])->defaultSort('created_at', 'desc');
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListVolunteers::route('/'),
            'create' => Pages\CreateVolunteer::route('/create'),
            'edit' => Pages\EditVolunteer::route('/{record}/edit'),
        ];
    }
}
