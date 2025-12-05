<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WorkshopParticipantResource\Pages;
use App\Models\WorkshopParticipant;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class WorkshopParticipantResource extends Resource
{
    protected static ?string $model = WorkshopParticipant::class;
    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationGroup = 'Workshop User Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->placeholder('Type the participant name')
                    ->maxLength(255)
                    ->columnSpan(2),
                Forms\Components\TextInput::make('occupation')
                    ->required()
                    ->placeholder('Type the participant occupation')
                    ->maxLength(255)
                    ->columnSpan([
                        'default' => 2,
                        'lg' => 1,
                    ]),
                Forms\Components\TextInput::make('email')
                    ->required()
                    ->placeholder('Type the participant email')
                    ->maxLength(255)
                    ->columnSpan([
                        'default' => 2,
                        'lg' => 1,
                    ]),
                Forms\Components\Select::make('workshop_id')
                    ->required()
                    ->relationship('workshop', 'name')
                    ->searchable()
                    ->preload()
                    ->columnSpan([
                        'default' => 2,
                        'lg' => 1,
                    ]),
                Forms\Components\Select::make('booking_transaction_id')
                    ->required()
                    ->label('Booking Transaction')
                    ->relationship('bookingTransaction', 'booking_trx_id')
                    ->searchable()
                    ->preload()
                    ->columnSpan([
                        'default' => 2,
                        'lg' => 1,
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('workshop.thumbnail'),
                Tables\Columns\TextColumn::make('bookingTransaction.booking_trx_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
            ])
            ->filters([
                SelectFilter::make('workshop_id')
                    ->label('Workshop')
                    ->relationship('workshop', 'name'),
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
            'index' => Pages\ListWorkshopParticipants::route('/'),
            'create' => Pages\CreateWorkshopParticipant::route('/create'),
            'edit' => Pages\EditWorkshopParticipant::route('/{record}/edit'),
        ];
    }
}
