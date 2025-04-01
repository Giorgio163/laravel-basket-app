<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CatalogueResource\Pages;
use App\Models\Catalogue;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\File;

class CatalogueResource extends Resource
{
    protected static ?string $model = Catalogue::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Catalogue Name')
                    ->required(),
                Forms\Components\TextInput::make('description')
                    ->label('Description')
                    ->required(),
                Forms\Components\TextInput::make('price')
                    ->label('Price')
                    ->required(),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->sortable(),
                Tables\Columns\TextColumn::make('description')->limit(50),
                Tables\Columns\TextColumn::make('price')->money('usd')->sortable(),

                Tables\Columns\ImageColumn::make('image')
                    ->label('Image')
                    ->getStateUsing(function ($record) {
                        // If image is already stored, use it
                        if ($record->image) {
                            return asset('images/catalogue/' . $record->image);
                        }

                        // Get available images from the catalogue folder
                        $imageFiles = File::files(public_path('images/catalogue'));
                        if (count($imageFiles) > 0) {
                            $randomImage = basename($imageFiles[array_rand($imageFiles)]);
                            // Save random image name to database
                            $record->update(['image' => $randomImage]);
                            return asset('images/catalogue/' . $randomImage);
                        }

                        return asset('images/catalogue/default.jpg'); // Fallback image
                    }),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCatalogues::route('/'),
            'create' => Pages\CreateCatalogue::route('/create'),
            'edit' => Pages\EditCatalogue::route('/{record}/edit'),
        ];
    }
}

