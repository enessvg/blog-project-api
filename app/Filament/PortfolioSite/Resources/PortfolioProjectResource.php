<?php

namespace App\Filament\PortfolioSite\Resources;

use App\Filament\PortfolioSite\Resources\PortfolioProjectResource\Pages;
use App\Filament\PortfolioSite\Resources\PortfolioProjectResource\RelationManagers;
use App\Models\Portfolio\PortfolioProject;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PortfolioProjectResource extends Resource
{
    protected static ?string $model = PortfolioProject::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $pluralModelLabel = 'Projects';

    protected static ?int $navigationSort = 102;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Project Details')
                    ->columns(2)
                    ->schema([
                        FileUpload::make('image')
                            ->label('Project Image')
                            ->required()
                            ->disk('public')
                            ->directory('portfolio/projects')
                            ->columnSpanFull()
                            ->imageEditor()
                            ->imageCropAspectRatio("1:1"),

                        TextInput::make('name')
                            ->label('Project Name')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),

                        TextInput::make('button_text')
                            ->label('Button Text')
                            ->required()
                            ->maxLength(255)
                            ->default('Siteye Git'),
                        TextInput::make('button_link')
                            ->label('Button Link')
                            ->required()
                            ->maxLength(255)
                            ->default('https://'),

                        Toggle::make('status')
                            ->label('Status')
                            ->default(true)
                            ->inline(true)
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('sort')
                    ->label('Sort')
                    ->sortable(),
                TextColumn::make('name')
                    ->label('Project Name')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('button_text')
                    ->label('Button Text')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('button_link')
                    ->label('Button Link')
                    ->searchable()
                    ->sortable(),

                ImageColumn::make('image')
                    ->label('Project Image')
                    ->size(150),

                ToggleColumn::make('status'),
            ])
            ->defaultSort('sort', 'asc')
            ->reorderable('sort')
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
            'index' => Pages\ListPortfolioProjects::route('/'),
            'create' => Pages\CreatePortfolioProject::route('/create'),
            'edit' => Pages\EditPortfolioProject::route('/{record}/edit'),
        ];
    }
}
