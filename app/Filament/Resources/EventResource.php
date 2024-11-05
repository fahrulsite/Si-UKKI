<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventResource\Pages;
use App\Filament\Resources\EventResource\Widgets\CalendarWidget as WidgetsCalendarWidget;
use App\Models\Event;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Infolists\Components;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EventResource extends Resource
{
    protected static ?string $model = Event::class;

    protected static ?string $navigationIcon = 'heroicon-c-list-bullet';
    protected static ?string $navigationGroup = 'Agenda';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                ->schema([
                    TextInput::make('title')
                    ->unique(ignoreRecord:true)
                    ->label("Nama Kegiatan")
                    ->columnSpanFull()
                    ->required()
                    ->maxLength(255),
                
                    RichEditor::make('body')
                    ->label("Isi")
                    ->required()
                    ->columnSpanFull(),
                ])->columnSpan(2),

                Section::make([
                    FileUpload::make('image')
                    ->label("Pamflet")
                    ->image()
                    ->required()
                    ->directory('event-image'),

                    Forms\Components\DateTimePicker::make('starts_at')
                    ->label("Waktu Mulai")
                    ->required(),
                    
                    Forms\Components\DateTimePicker::make('ends_at')
                    ->label("Waktu Selesai")
                    ->required(),

                    Forms\Components\Select::make('event_category_id')
                    ->relationship('eventCategory', 'name')
                    ->label("Kategori")
                    ->multiple()
                    ->preload()
                    ->required(),
                    
                Forms\Components\TextInput::make('url')
                    ->label("Link Pendaftaran")
                    ->required()
                    ->maxLength(255),
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
                Tables\Columns\TextColumn::make('starts_at')
                    ->label("Waktu Mulai")
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('ends_at')
                    ->label("Waktu Selesai")
                    ->dateTime()
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
            ]) ->defaultSort('created_at', 'desc');
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
            'index' => Pages\ListEvents::route('/'),
            'create' => Pages\CreateEvent::route('/create'),
            'edit' => Pages\EditEvent::route('/{record}/edit'),
            'view' => Pages\ViewEvent::route('/{record}')
        ];
    }

    public static function getWidgets(): array
    {
        return [
            WidgetsCalendarWidget::class,
        ];
    }

    
}
