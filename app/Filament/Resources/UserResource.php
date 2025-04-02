<?php

namespace App\Filament\Resources;

use App\Models\User;
use Filament\Resources\Resource;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use App\Filament\Resources\UserResource\Pages;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                TextInput::make('email')
                    ->email()
                    ->unique(ignoreRecord: true)
                    ->required(),
                TextInput::make('password')
                    ->password()
                    ->required()
                    ->hiddenOn('edit'),
                Select::make('roles')
                    ->label('Role')
                    ->options(Role::all()->pluck('name', 'name')->toArray())
                    ->searchable()
                    ->preload()
                    ->afterStateUpdated(fn ($state, $record) => $record->syncRoles($state)),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable(),
                TextColumn::make('name')->sortable()->searchable(),
                TextColumn::make('email')->sortable()->searchable(),
                TextColumn::make('roles')->sortable()->label('Roles')
                    ->getStateUsing(function ($record) {
                        return $record->roles->pluck('name')->implode(', ');
                    }),
                TextColumn::make('created_at')->dateTime(),
            ])
            ->filters([
                SelectFilter::make('roles')
                    ->options([
                        'admin' => 'Admin',
                        'user' => 'User',
                    ]),
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
    public static function saved(User $user, array $data): void
    {

        if (isset($data['roles'])) {
            $user->syncRoles([$data['roles']]);
        }
    }
}
