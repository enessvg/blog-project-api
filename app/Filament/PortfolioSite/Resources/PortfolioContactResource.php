<?php

namespace App\Filament\PortfolioSite\Resources;

use App\Filament\PortfolioSite\Resources\PortfolioContactResource\Pages;
use App\Filament\PortfolioSite\Resources\PortfolioContactResource\RelationManagers;
use App\Models\Portfolio\PortfolioContact;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Infolists;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Infolist;

class PortfolioContactResource extends Resource
{
    protected static ?string $model = PortfolioContact::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?int $navigationSort = 103;


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }
    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Section::make('Contact Details')
                ->schema([
                    Infolists\Components\TextEntry::make('name'),
                    Infolists\Components\TextEntry::make('email'),
                    Infolists\Components\TextEntry::make('message')
                        ->columnSpanFull(),
                        Infolists\Components\TextEntry::make('created_at')
    ->since()
    ->dateTimeTooltip()
                ])->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('email')
                    ->label('Email')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('message')
                    ->label('Message')
                    ->searchable()
                    ->sortable()
                    ->limit(70),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListPortfolioContacts::route('/'),
            'create' => Pages\CreatePortfolioContact::route('/create'),
            // 'edit' => Pages\EditPortfolioContact::route('/{record}/edit'),
        ];
    }
}
