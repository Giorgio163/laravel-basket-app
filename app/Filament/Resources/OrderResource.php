<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Models\Order;
use Filament\Forms;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\View;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';

    protected static ?string $navigationGroup = 'Orders';

    public static function form(Forms\Form $form): Forms\Form
    {
        $order = $form->getRecord();

        $items = json_decode($order->items, true);
        $userId = $order->user_id;
        $totalPrice = $order->total_price;

        return $form
            ->schema([
                View::make('filament.order-items')
                    ->label('User ID')
                    ->viewData(['userId' => $userId])
                    ->disabled(),

                View::make('filament.order-items')
                    ->label('Total Price')
                    ->viewData(['totalPrice' => $totalPrice])
                    ->disabled(),

                View::make('filament.order-items')
                    ->label('Items')
                    ->viewData(['items' => $items])
                    ->disabled(),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->label('Order ID'),
                Tables\Columns\TextColumn::make('user_id')->label('User ID'),
                Tables\Columns\TextColumn::make('total_price')->label('Total Price')
                    ->money('USD'),
                Tables\Columns\TextColumn::make('created_at')->label('Created At')
                    ->dateTime('d/m/Y H:i'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
