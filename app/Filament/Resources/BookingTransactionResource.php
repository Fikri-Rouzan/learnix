<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookingTransactionResource\Pages;
use App\Filament\Resources\BookingTransactionResource\RelationManagers;
use App\Models\BookingTransaction;
use App\Models\Workshop;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use PhpParser\Node\Stmt\Label;

class BookingTransactionResource extends Resource
{
    protected static ?string $model = BookingTransaction::class;

    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';

    protected static ?string $navigationGroup = 'Workshop Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Wizard::make([
                    Forms\Components\Wizard\Step::make('Product and Price')
                        ->schema([
                            Forms\Components\Select::make('workshop_id')
                                ->relationship('workshop', 'name')
                                ->searchable()
                                ->preload()
                                ->required()
                                ->live()
                                ->afterStateUpdated(function ($state, callable $set) {
                                    $workshop = Workshop::find($state);
                                    $set('price', $workshop ? $workshop->price : 0);
                                })
                                ->afterStateHydrated(function ($state, callable $get, callable $set) {
                                    $workshop = Workshop::find($state);
                                    $set('price', $workshop ? $workshop->price : 0);
                                }),
                            Forms\Components\TextInput::make('quantity')
                                ->required()
                                ->numeric()
                                ->prefix('Qty People')
                                ->live()
                                ->afterStateUpdated(function ($state, callable $get, callable $set) {
                                    $price = $get('price');
                                    $subTotal = $price * $state;
                                    $tax = $subTotal * 0.11;
                                    $totalAmount = $subTotal + $tax;

                                    $set('total_amount', $totalAmount);

                                    $participants = $get('participants') ?? [];
                                    $currentCount = count($participants);

                                    if ($state > $currentCount) {
                                        for ($i = $currentCount; $i < $state; $i++) {
                                            $participants[] = ['name' => '', 'occupation' => '', 'email' => ''];
                                        }
                                    } else {
                                        $participants = array_slice($participants, 0, $state);
                                    }
                                    $set('participants', $participants);
                                })
                                ->afterStateHydrated(function ($state, callable $get, callable $set) {
                                    $price = $get('price');
                                    $subTotal = $price * $state;
                                    $tax = $subTotal * 0.11;
                                    $totalAmount = $subTotal + $tax;

                                    $set('total_amount', $totalAmount);
                                }),
                            Forms\Components\TextInput::make('total_amount')
                                ->required()
                                ->numeric()
                                ->prefix('IDR')
                                ->readOnly()
                                ->helperText('Including 11% tax'),
                            Repeater::make('participants')
                                ->schema([
                                    Grid::make(2)
                                        ->schema([
                                            Forms\Components\TextInput::make('name')
                                                ->label('Participant Name')
                                                ->columnSpan(2)
                                                ->required(),
                                            Forms\Components\TextInput::make('occupation')
                                                ->label('Occupation')
                                                ->required(),
                                            Forms\Components\TextInput::make('email')
                                                ->label('Email')
                                                ->required(),
                                        ]),
                                ])
                                ->columns(1)
                                ->label('Participant Details'),
                        ]),
                    Forms\Components\Wizard\Step::make('Customer Information')
                        ->schema([
                            Forms\Components\TextInput::make('name')
                                ->required()
                                ->maxLength(255),
                            Forms\Components\TextInput::make('email')
                                ->required()
                                ->maxLength(255),
                            Forms\Components\TextInput::make('phone')
                                ->required()
                                ->maxLength(255),
                            Forms\Components\TextInput::make('customer_bank_name')
                                ->required()
                                ->maxLength(255),
                            Forms\Components\TextInput::make('customer_bank_account')
                                ->required()
                                ->maxLength(255),
                            Forms\Components\TextInput::make('customer_bank_number')
                                ->required()
                                ->maxLength(255),
                            Forms\Components\TextInput::make('booking_trx_id')
                                ->required()
                                ->readOnly()
                                ->maxLength(255),
                        ]),
                    Forms\Components\Wizard\Step::make('Payment Information')
                        ->schema([
                            ToggleButtons::make('is_paid')
                                ->label('Has it been paid?')
                                ->boolean()
                                ->grouped()
                                ->icons([
                                    true => 'heroicon-o-pencil',
                                    false => 'heroicon-o-clock',
                                ])
                                ->required(),
                            Forms\Components\FileUpload::make('proof')
                                ->image()
                                ->directory('proofs')
                                ->required(),
                        ]),
                ])
                    ->columnSpan('full')
                    ->columns(1)
                    ->skippable()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('workshop.thumbnail'),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('booking_trx_id')
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_paid')
                    ->boolean()
                    ->trueColor('success')
                    ->falseColor('danger')
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->label('Verified'),
            ])
            ->filters([
                SelectFilter::make('workshop_id')
                    ->label('Workshop')
                    ->relationship('workshop', 'name'),
            ])
            ->actions([
                Tables\Actions\Action::make('approve')
                    ->label('Approve')
                    ->action(function (BookingTransaction $record) {
                        $record->is_paid = true;
                        $record->save();

                        Notification::make()
                            ->title('Order Approved')
                            ->success()
                            ->body('The order has been successfully approve')
                            ->send();
                    })
                    ->color('success')
                    ->requiresConfirmation()
                    ->visible(fn(BookingTransaction $record) => !$record->is_paid),
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
            'index' => Pages\ListBookingTransactions::route('/'),
            'create' => Pages\CreateBookingTransaction::route('/create'),
            'edit' => Pages\EditBookingTransaction::route('/{record}/edit'),
        ];
    }
}
