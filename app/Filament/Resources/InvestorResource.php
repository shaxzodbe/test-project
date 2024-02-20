<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InvestorResource\Pages;
use App\Filament\Resources\InvestorResource\RelationManagers;
use App\Models\Investor;
use Filament\Forms;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class InvestorResource extends Resource
{
    protected static ?string $model = Investor::class;

    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';

    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('activity_sphere_id')
                    ->relationship('activitySphere', 'title')
                    ->required(),
                Forms\Components\TextInput::make('full_name')
                    ->required()
                    ->maxLength(255),
              Repeater::make('projects_in_uzbekistan')
                ->schema([
                  TextInput::make('project_name')
                    ->required(),
                  Forms\Components\FileUpload::make('signed_agreements')
                    ->required()
                    ->image()
                    ->acceptedFileTypes([
                      'image/png',
                      'image/jpeg',
                    ])
                    ->maxSize(10240)
                    ->directory('signed-agreements'),
                ])
                ->required(),
                Forms\Components\TextInput::make('country_of_origin')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('total_investment')
                    ->required()
                    ->numeric()
                    ->prefix('$'),
                Forms\Components\Textarea::make('company_contact_info')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('company_reference_list')
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
                Tables\Columns\TextColumn::make('full_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('country_of_origin')
                    ->searchable(),
                Tables\Columns\TextColumn::make('total_investment')
                    ->numeric()
                    ->prefix('$')
                    ->sortable(),
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
            'index' => Pages\ListInvestors::route('/'),
            'create' => Pages\CreateInvestor::route('/create'),
            'edit' => Pages\EditInvestor::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}
