<?php

namespace App\Filament\PortfolioSite\Resources;

use App\Filament\PortfolioSite\Resources\AboutResource\Pages;
use App\Filament\PortfolioSite\Resources\AboutResource\RelationManagers;
use App\Models\About;
use App\Models\Portfolio\PortfolioAbout;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AboutResource extends Resource
{
    protected static ?string $model = PortfolioAbout::class;

    protected static ?string $pluralModelLabel = 'About';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?int $navigationSort = 101;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('About Details')
                ->schema([
                    FileUpload::make('image')
                        ->label('Image')
                        ->required()
                        ->disk('public')
                        ->directory('portfolio/abouts')
                        ->columnSpanFull(),

                    TextInput::make('title')
                        ->label('Title')
                        ->required()
                        ->maxLength(255)
                        ->columnSpanFull(),
                    
                    RichEditor::make('description')
                        ->label('Description')
                        ->required()
                        ->columnSpanFull(),

                    TextInput::make('button_text')
                        ->label('Button Text')
                        ->required()
                        ->maxLength(255),

                    TextInput::make('button_link')
                        ->label('Button Link')
                        ->required(),


                ])->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->label('Image')
                    ->size(50)
                    ->circular(),

                Tables\Columns\TextColumn::make('title')
                    ->label('Title'),

                Tables\Columns\TextColumn::make('description')
                    ->label('Description')
                    ->limit(80)
                    ->html(),    
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
            'index' => Pages\ListAbouts::route('/'),
            'create' => Pages\CreateAbout::route('/create'),
            'edit' => Pages\EditAbout::route('/{record}/edit'),
        ];
    }
}
