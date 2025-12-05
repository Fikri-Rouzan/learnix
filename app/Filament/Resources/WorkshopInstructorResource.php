<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WorkshopInstructorResource\Pages;
use App\Models\WorkshopInstructor;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class WorkshopInstructorResource extends Resource
{
    protected static ?string $model = WorkshopInstructor::class;
    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationGroup = 'Workshop User Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->placeholder('Type the instructor name')
                    ->maxLength(255)
                    ->columnSpan([
                        'default' => 2,
                        'lg' => 1,
                    ]),
                Forms\Components\TextInput::make('occupation')
                    ->required()
                    ->placeholder('Type the instructor occupation')
                    ->maxLength(255)
                    ->columnSpan([
                        'default' => 2,
                        'lg' => 1,
                    ]),
                Forms\Components\FileUpload::make('avatar')
                    ->required()
                    ->image()
                    ->directory('instructors')
                    ->columnSpan(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('occupation'),
                Tables\Columns\ImageColumn::make('avatar'),
            ])
            ->filters([
                //
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
            'index' => Pages\ListWorkshopInstructors::route('/'),
            'create' => Pages\CreateWorkshopInstructor::route('/create'),
            'edit' => Pages\EditWorkshopInstructor::route('/{record}/edit'),
        ];
    }
}
