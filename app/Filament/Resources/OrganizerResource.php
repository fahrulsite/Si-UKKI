<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrganizerResource\Pages;
use App\Filament\Resources\OrganizerResource\RelationManagers;
use App\Models\Division;
use App\Models\Organizer;
use App\Models\Periode;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrganizerResource extends Resource
{
    protected static ?string $model = Organizer::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Data Kepengurusan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('Add Personal')->tabs([
                    Tab::make('Personal Information')
                        ->icon('heroicon-s-user')
                        ->iconPosition('after')
                        ->schema([
                            Forms\Components\TextInput::make('name')
                                ->required()
                                ->maxLength(255),
                            Forms\Components\TextInput::make('nim')
                                ->required()
                                ->maxLength(255),
                            Forms\Components\TextInput::make('address')
                                ->required()
                                ->maxLength(255),
                            Forms\Components\Select::make('fakulty')
                                ->options([
                                    'FT' => 'Fakultas Teknik',
                                    'FMIPA' => 'Fakultas Matematika dan Ilmu Pengetahuan Alam',
                                    'FEB' => 'Fakultas Ekonomi dan Bisnis',
                                    'FISHIPOL' => 'Fakultas Ilmu Sosial, Hukum dan Ilmu Politik',
                                    'FBSB' => 'Fakultas Bahasa, Seni, dan Budaya',
                                    'FIPP' => 'Fakultas Ilmu Pendidikan dan Psikologi',
                                    'FIKK' => 'Fakultas Ilmu Keolahragaan dan Kesehatan',
                                    'FV' => 'Fakultas Vokasi'
                                ])
                            
                                ->required(),
                            Forms\Components\TextInput::make('class')
                                ->required()
                                ->maxLength(255),
                            Forms\Components\TextInput::make('generation')
                                ->required()
                                ->maxLength(255),
                            Forms\Components\Select::make('gender')
                                ->options([
                                    'ikhwan' => 'Ikhwan',
                                    'akhwat' => 'Akhwat',
                                ])
                                ->required(),
                            Forms\Components\TextInput::make('place_of_birth')
                                ->required()
                                ->maxLength(255),
                            Forms\Components\DatePicker::make('year_of_birth')
                                ->required(),
                            Forms\Components\TextInput::make('phone_number')
                                ->tel()
                                ->required()
                                ->maxLength(255),
                            Forms\Components\TextInput::make('instagram')
                                ->required()
                                ->maxLength(255),

                        ]),
                    Tab::make('Organizer')
                        ->icon('heroicon-s-briefcase')
                        ->iconPosition('after')    
                        ->schema([
                            Forms\Components\Repeater::make('management')
                            // ->label('Positions')
                            ->schema([

                                Forms\Components\Select::make('periode_id')
                                ->options(Periode::all()->pluck('name', 'id'))
                                ->searchable()// Set the default value to an appropriate periode_id
                                ->required(),
            
                                Forms\Components\Select::make('division_id')
                                    ->options(Division::all()->pluck('name', 'id'))
                                    ->required(),
            
                                Forms\Components\TextInput::make('position')
                                    ->required()
                                    ->maxLength(255),
                            ])
                        ]),

                    Tab::make('Pasca Kampus')
                        ->icon('heroicon-s-academic-cap')
                        ->iconPosition('after')
                        ->schema([
                            Forms\Components\Toggle::make('graduated')
                                ->required(),
                            Forms\Components\TextInput::make('job')
                                ->maxLength(255),
                            Forms\Components\TextInput::make('place_of_job')
                                ->maxLength(255),
                        ]),

                    Tab::make('Dauroh Daawi')
                        ->icon('heroicon-s-chart-bar')
                        ->iconPosition('after')
                        ->schema([
                            Forms\Components\Toggle::make('Dauroh Daawi-1')
                            ->required(),
                            Forms\Components\Toggle::make('Dauroh Daawi-2')
                                ->required(),
                            Forms\Components\Toggle::make('Dauroh Daawi-3')
                                ->required(),
                        ]),

                    Tab::make('Prestasi')
                        ->icon('heroicon-s-star')
                        ->iconPosition('after')
                        ->schema([
                            Forms\Components\Repeater::make('achievement')
                            // ->label('Positions')
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                    ->required()
                                    ->maxLength(255),
            
                                Forms\Components\Select::make('level')
                                    ->options(config('achievement_type.achievement'))
                                    ->required(),
            
                                Forms\Components\TextInput::make('juara')
                                    ->required()
                                    ->maxLength(255),
                            ])
                        ])
                ])


                // Forms\Components\TextInput::make('name')
                //     ->required()
                //     ->maxLength(255),
                // Forms\Components\TextInput::make('nim')
                //     ->required()
                //     ->maxLength(255),
                // Forms\Components\TextInput::make('address')
                //     ->required()
                //     ->maxLength(255),
                // Forms\Components\TextInput::make('fakulty')
                //     ->required()
                //     ->maxLength(255),
                // Forms\Components\TextInput::make('class')
                //     ->required()
                //     ->maxLength(255),
                // Forms\Components\TextInput::make('generation')
                //     ->required()
                //     ->maxLength(255),
                // Forms\Components\TextInput::make('gender')
                //     ->required()
                //     ->maxLength(255),
                // Forms\Components\TextInput::make('place_of_birth')
                //     ->required()
                //     ->maxLength(255),
                // Forms\Components\DatePicker::make('year_of_birth')
                //     ->required(),
                // Forms\Components\TextInput::make('phone_number')
                //     ->tel()
                //     ->required()
                //     ->maxLength(255),
                // Forms\Components\TextInput::make('instagram')
                //     ->required()
                //     ->maxLength(255),
                // Forms\Components\TextInput::make('management'),
                // Forms\Components\Toggle::make('graduated')
                //     ->required(),
                // Forms\Components\TextInput::make('job')
                //     ->maxLength(255),
                // Forms\Components\TextInput::make('place_of_job')
                //     ->maxLength(255),
                // Forms\Components\Toggle::make('DD1')
                //     ->required(),
                // Forms\Components\Toggle::make('DD2')
                //     ->required(),
                // Forms\Components\Toggle::make('DD3')
                //     ->required(),
                // Forms\Components\TextInput::make('achievement'),
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nim')
                    ->searchable(),
                Tables\Columns\TextColumn::make('address')
                    ->searchable(),
                Tables\Columns\TextColumn::make('fakulty')
                    ->searchable(),
                Tables\Columns\TextColumn::make('class')
                    ->searchable(),
                Tables\Columns\TextColumn::make('generation')
                    ->searchable(),
                Tables\Columns\TextColumn::make('gender')
                    ->searchable(),
                Tables\Columns\TextColumn::make('place_of_birth')
                    ->searchable(),
                Tables\Columns\TextColumn::make('year_of_birth')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('phone_number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('instagram')
                    ->searchable(),
                Tables\Columns\IconColumn::make('graduated')
                    ->boolean(),
                Tables\Columns\TextColumn::make('job')
                    ->searchable(),
                Tables\Columns\TextColumn::make('place_of_job')
                    ->searchable(),
                Tables\Columns\IconColumn::make('DD1')
                    ->boolean(),
                Tables\Columns\IconColumn::make('DD2')
                    ->boolean(),
                Tables\Columns\IconColumn::make('DD3')
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
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListOrganizers::route('/'),
            'create' => Pages\CreateOrganizer::route('/create'),
            'edit' => Pages\EditOrganizer::route('/{record}/edit'),
        ];
    }
}
