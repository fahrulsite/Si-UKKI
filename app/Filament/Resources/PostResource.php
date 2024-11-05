<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers;
use App\Models\Post;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TagsColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-s-newspaper';
    protected static ?string $navigationGroup = 'Berita Kabar UKKI';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Section::make()
                ->schema([
                    Forms\Components\TextInput::make('title')
                        ->label('Judul')    
                        ->unique(ignoreRecord:true)
                        ->columnSpanFull()
                        ->required()
                        ->maxLength(255),
                
                    RichEditor::make('body')
                        ->label('isi')
                        ->required()
                        ->columnSpanFull(),
                ])->columnSpan(2),
                

                Section::make()
                ->schema([
                    FileUpload::make('thumbnail')
                    ->label('Sampul')
                    ->image()
                    ->maxSize(2560)
                    ->columnSpanFull()
                    ->required()
                    ->directory('thumbnail-post'),
        
                
                Forms\Components\Select::make('category_id')
                    ->label('Kategori')
                    ->relationship('category', 'name')
                    ->required()
                    ->multiple()
                    ->preload()
                    ->searchable(),

                // TagsColumn::make('categories.name')
                //     ->label('Kategori')
                //     ->sortable(),

                Forms\Components\Toggle::make('status')
                    ->required(),
                ])->columnSpan(1)
                
            ])
            ->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('thumbnail')
                ->label("Sampul"),
                Tables\Columns\TextColumn::make('title')
                    ->label("Judul Berita")
                    ->searchable(),
                // Tables\Columns\TextColumn::make('category.name')
                //     ->numeric()
                //     ->sortable(),
                Tables\Columns\IconColumn::make('status')
                    ->boolean(),
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
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
