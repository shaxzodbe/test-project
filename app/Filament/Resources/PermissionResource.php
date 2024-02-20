<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PermissionResource\Pages;
use App\Filament\Resources\PermissionResource\RelationManagers;
use Filament\Actions\Action;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;

class PermissionResource extends Resource
{
    protected static ?string $model = Permission::class;

    protected static ?string $navigationIcon = 'heroicon-o-key';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
          ->schema([
            TextInput::make('name')
              ->minLength(2)
              ->maxLength(255)
              ->required()
              ->unique(ignoreRecord: true)
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
              Action::make('exportToPdf')
                ->label('Export to PDF')
                ->url(route('export', ['type' => 'permissions']), true)
                ->icon('heroicon-o-folder-arrow-down')
                ->color('success'),
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
          'index' => Pages\ListPermissions::route('/'),
          'create' => Pages\CreatePermission::route('/create'),
          'edit' => Pages\EditPermission::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function canViewAny(): bool
    {
        return Auth::user()->can('read permissions');
    }

    // Определение, кто может создавать пользователей
    public static function canCreate(): bool
    {
        return Auth::user()->can('create permissions');
    }

    // Определение, кто может просматривать детали пользователя
    public static function canView(Model $record): bool
    {
        return Auth::user()->can('read permissions');
    }

    // Определение, кто может редактировать пользователей
    public static function canEdit(Model $record): bool
    {
        return Auth::user()->can('update permissions');
    }

    // Определение, кто может удалять пользователей
    public static function canDelete(Model $record): bool
    {
        return Auth::user()->can('delete permissions');
    }
}
