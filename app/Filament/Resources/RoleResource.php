<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RoleResource\Pages;
use App\Filament\Resources\RoleResource\RelationManagers;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class RoleResource extends Resource
{
    protected static ?string $model = Role::class;

    protected static ?string $navigationIcon = 'heroicon-o-check-badge';

    protected static ?int $navigationSort = 8;

    public static function form(Form $form): Form
    {
        return $form
          ->schema([
            TextInput::make('name')
              ->minLength(2)
              ->maxLength(255)
              ->required()
              ->unique(ignoreRecord: true),
            Select::make('permissions')
              ->multiple()
              ->relationship('permissions', 'name')
              ->preload()
          ]);
    }

    public static function table(Table $table): Table
    {
        return $table
          ->columns([
            Tables\Columns\TextColumn::make('id')->sortable(),
            Tables\Columns\TextColumn::make('name'),
            Tables\Columns\TextColumn::make('created_at')
              ->dateTime('d-M-Y')->sortable(),
            Tables\Columns\TextColumn::make('updated_at')
              ->dateTime('d-M-Y')->sortable()
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
          'index' => Pages\ListRoles::route('/'),
          'create' => Pages\CreateRole::route('/create'),
          'edit' => Pages\EditRole::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function canViewAny(): bool
    {
        return Auth::user()->can('read roles');
    }

    // Определение, кто может создавать пользователей
    public static function canCreate(): bool
    {
        return Auth::user()->can('create roles');
    }

    // Определение, кто может просматривать детали пользователя
    public static function canView(Model $record): bool
    {
        return Auth::user()->can('read roles');
    }

    // Определение, кто может редактировать пользователей
    public static function canEdit(Model $record): bool
    {
        return Auth::user()->can('update roles');
    }

    // Определение, кто может удалять пользователей
    public static function canDelete(Model $record): bool
    {
        return Auth::user()->can('delete roles');
    }
}
