<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectResource\Pages;
use App\Filament\Resources\ProjectResource\RelationManagers;
use App\Models\Project;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static ?string $navigationIcon = 'heroicon-o-list-bullet';

    protected static ?int $navigationSort = 6;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('activity_sphere_id')
                    ->relationship('activitySphere', 'title')
                    ->required(),
                Forms\Components\Select::make('region_id')
                    ->relationship('region', 'title')
                    ->required(),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('estimated_cost')
                    ->required()
                    ->prefix('$')
                    ->numeric(),
                Forms\Components\Select::make('potential_investor_id')
                    ->relationship('potentialInvestor', 'full_name')
                    ->nullable(),
                Forms\Components\TextInput::make('responsible_person')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('local_partner')
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('activitySphere.title')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('region.title')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('estimated_cost')
                    ->numeric()
                    ->prefix('$')
                    ->sortable(),
                TextColumn::make('potentialInvestor.full_name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('responsible_person')
                    ->searchable(),
                Tables\Columns\TextColumn::make('local_partner')
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
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function canViewAny(): bool
    {
        return Auth::user()->can('read projects');
    }

    // Определение, кто может создавать пользователей
    public static function canCreate(): bool
    {
        return Auth::user()->can('create projects');
    }

    // Определение, кто может просматривать детали пользователя
    public static function canView(Model $record): bool
    {
        return Auth::user()->can('read projects');
    }

    // Определение, кто может редактировать пользователей
    public static function canEdit(Model $record): bool
    {
        return Auth::user()->can('update projects');
    }

    // Определение, кто может удалять пользователей
    public static function canDelete(Model $record): bool
    {
        return Auth::user()->can('delete projects');
    }
}
