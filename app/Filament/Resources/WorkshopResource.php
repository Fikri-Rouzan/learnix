<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WorkshopResource\Pages;
use App\Models\Workshop;
use Filament\Forms;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class WorkshopResource extends Resource
{
    protected static ?string $model = Workshop::class;
    protected static ?string $navigationIcon = 'heroicon-o-calendar';
    protected static ?string $navigationGroup = 'Workshop Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Fieldset::make('Workshop Details')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->placeholder('Type the workshop name')
                            ->maxLength(255)
                            ->columnSpan(2),
                        Forms\Components\Textarea::make('address')
                            ->required()
                            ->placeholder('Type the workshop address')
                            ->rows(3)
                            ->columnSpan(2),
                        Forms\Components\FileUpload::make('thumbnail')
                            ->required()
                            ->image()
                            ->directory('workshop_thumbnails')
                            ->columnSpan(2),
                        Forms\Components\FileUpload::make('venue_thumbnail')
                            ->required()
                            ->label('Venue Thumbnail')
                            ->image()
                            ->directory('venue_thumbnails')
                            ->columnSpan(2),
                        Forms\Components\FileUpload::make('bg_map')
                            ->required()
                            ->image()
                            ->label('Background Map')
                            ->directory('maps')
                            ->columnSpan(2),
                        Forms\Components\Repeater::make('benefits')
                            ->relationship('benefits')
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                    ->required()
                                    ->placeholder('Type the benefit name')
                                    ->maxLength(255),
                            ])
                            ->columnSpan(2),
                    ]),
                Fieldset::make('Additional Information')
                    ->schema([
                        Forms\Components\Textarea::make('about')
                            ->required()
                            ->placeholder('Type the workshop description')
                            ->rows(5)
                            ->columnSpan(2),
                        Forms\Components\TextInput::make('price')
                            ->required()
                            ->placeholder('Type the workshop price')
                            ->numeric()
                            ->minValue(0)
                            ->prefix('IDR')
                            ->columnSpan([
                                'default' => 2,
                                'lg' => 1,
                            ]),
                        Forms\Components\Select::make('is_open')
                            ->required()
                            ->label('Availability Status')
                            ->options([
                                true => 'Open',
                                false => 'Not Available',
                            ])
                            ->columnSpan([
                                'default' => 2,
                                'lg' => 1,
                            ]),
                        Forms\Components\Select::make('has_started')
                            ->required()
                            ->label('Started Status')
                            ->options([
                                true => 'Started',
                                false => 'Not Started Yet',
                            ])
                            ->columnSpan([
                                'default' => 2,
                                'lg' => 1,
                            ]),
                        Forms\Components\Select::make('category_id')
                            ->required()
                            ->relationship('category', 'name')
                            ->searchable()
                            ->preload()
                            ->columnSpan([
                                'default' => 2,
                                'lg' => 1,
                            ]),
                        Forms\Components\Select::make('workshop_instructor_id')
                            ->required()
                            ->relationship('instructor', 'name')
                            ->searchable()
                            ->preload()
                            ->columnSpan([
                                'default' => 2,
                                'lg' => 1,
                            ]),
                        Forms\Components\DatePicker::make('started_at')
                            ->required()
                            ->label('Start Date')
                            ->columnSpan([
                                'default' => 2,
                                'lg' => 1,
                            ]),
                        Forms\Components\TimePicker::make('time_at')
                            ->required()
                            ->label('Time')
                            ->columnSpan(2),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('thumbnail'),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('category.name'),
                Tables\Columns\TextColumn::make('instructor.name'),
                Tables\Columns\IconColumn::make('has_started')
                    ->boolean()
                    ->trueColor('success')
                    ->falseColor('danger')
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->label('Started'),
                Tables\Columns\TextColumn::make('participants_count')
                    ->label('Participants')
                    ->counts('participants')
            ])
            ->filters([
                SelectFilter::make('category_id')
                    ->label('Category')
                    ->relationship('category', 'name'),
                SelectFilter::make('workshop_instructor_id')
                    ->label('Workshop Instructor')
                    ->relationship('instructor', 'name'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListWorkshops::route('/'),
            'create' => Pages\CreateWorkshop::route('/create'),
            'edit' => Pages\EditWorkshop::route('/{record}/edit'),
        ];
    }
}
