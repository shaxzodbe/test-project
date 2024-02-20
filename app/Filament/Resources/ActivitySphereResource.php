<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ActivitySphereResource\Pages;
use App\Filament\Resources\ActivitySphereResource\RelationManagers;
use App\Models\ActivitySphere;
use Filament\Actions\Action;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class ActivitySphereResource extends Resource
{
    protected static ?string $model = ActivitySphere::class;

    protected static ?string $navigationIcon = 'heroicon-o-sparkles';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
          ->schema([
            Forms\Components\TextInput::make('title')
              ->required()
              ->maxLength(255),
          ]);
    }

    public static function table(Table $table): Table
    {
        return $table
          ->columns([
            Tables\Columns\TextColumn::make('title')
              ->searchable(),
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
            Tables\Actions\DeleteAction::make(),
          ])
          ->bulkActions([
            Tables\Actions\BulkActionGroup::make([
              Tables\Actions\DeleteBulkAction::make(),
              Action::make('exportToPdf')
                ->label('Export to PDF')
                ->url(route('activity-spheres.export', ['format' => 'pdf']))
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
          'index' => Pages\ListActivitySpheres::route('/'),
          'create' => Pages\CreateActivitySphere::route('/create'),
          'edit' => Pages\EditActivitySphere::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function canViewAny(): bool
    {
        return Auth::user()->can('read activity spheres');
    }

    // Определение, кто может создавать пользователей
    public static function canCreate(): bool
    {
        return Auth::user()->can('create activity spheres');
    }

    // Определение, кто может просматривать детали пользователя
    public static function canView(Model $record): bool
    {
        return Auth::user()->can('read activity spheres');
    }

    // Определение, кто может редактировать пользователей
    public static function canEdit(Model $record): bool
    {
        return Auth::user()->can('update activity spheres');
    }

    // Определение, кто может удалять пользователей
    public static function canDelete(Model $record): bool
    {
        return Auth::user()->can('delete activity spheres');
    }
}
