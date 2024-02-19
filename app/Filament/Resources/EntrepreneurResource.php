<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EntrepreneurResource\Pages;
use App\Filament\Resources\EntrepreneurResource\RelationManagers;
use App\Models\Entrepreneur;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EntrepreneurResource extends Resource
{
    protected static ?string $model = Entrepreneur::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

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
                Forms\Components\TextInput::make('full_name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('company_contact_info')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),
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
                Tables\Columns\TextColumn::make('full_name')
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
            'index' => Pages\ListEntrepreneurs::route('/'),
            'create' => Pages\CreateEntrepreneur::route('/create'),
            'edit' => Pages\EditEntrepreneur::route('/{record}/edit'),
        ];
    }
}
