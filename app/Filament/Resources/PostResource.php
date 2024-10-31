<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers;
use App\Models\Category;
use App\Models\Post;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;
use Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Blog';

    protected static ?int $navigationSort = 1;

    protected static ?string $recordTitleAttribute = 'title';

    // protected static ?string $recordTitleAttribute = 'tags';


    public static function form(Form $form): Form
{
    $categories = \App\Models\Category::all();

    $categoryOptions = $categories->mapWithKeys(function ($category) {
        return [$category->id => $category->name];
    })->toArray();

    $user_id = auth()->id();

    return $form
        ->schema([
            Group::make()
                ->schema([
                    Section::make('Post Detail')
                        ->schema([
                            FileUpload::make('image')
                                ->directory('form-attachments')
                                // ->preserveFilenames()
                                ->image()
                                ->imageEditor()
                                ->columnSpanFull(),

                            TextInput::make('title')
                            ->rules(['required'])
                            ->markAsRequired()
                            ->live(debounce:'750')
                            ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state))),
                            TextInput::make('slug')
                            ->rules(['required'])
                            ->markAsRequired()
                            ->disabled()
                            ->dehydrated(),

                            // TextInput::make('title')
                            //     ->label('Title')
                            //     ->required()
                            //     ->live(onBlur: true)
                            //     ->unique(ignoreRecord: true)
                            //     ->afterStateUpdated(function(string $operation, $state, Forms\Set $set) {
                            //         if ($operation !== 'create') {
                            //             return;
                            //         }

                            //         $set('slug', Str::slug($state));
                            //     }),

                            // TextInput::make('slug')
                            //     ->dehydrated()
                            //     ->required()
                            //     ->unique(Post::class, 'slug', ignoreRecord: true),

                                Select::make('category_id')
                                ->label('Category')
                                ->options($categoryOptions)
                                ->rules(['required'])
                                ->markAsRequired(),

                                TagsInput::make('tags')
                                ->label('Tags')
                                ->rules(['required'])
                                ->markAsRequired()
                                ->columnSpanFull(),

                            TinyEditor::make('content')
                                ->label('Post details')
                                ->columnSpanFull()
                                ->rules(['required'])
                                ->markAsRequired(),

                            Toggle::make('is_visible')
                                ->label('Visibility')
                                ->helperText('Enable or disable post visibility')
                                ->default(true)
                                ->hidden(fn() => ! auth()->user()->hasRole(['super_admin']))
                                ,

                            DatePicker::make('start_date')
                                ->label('Start Date')
                                ->default(now())
                                ->rules(['required'])
                                ->markAsRequired(),

                            DatePicker::make('end_date')
                                ->label('End Date')
                                ->default(now())
                                ->after("starterDate")
                                ->minDate(now()->addDay())
                                ->rules(['required'])
                                ->markAsRequired(),

                                Hidden::make('user_id')
                                ->default($user_id),

                        ])
                        ->columns(3),
                ])
                ->columnSpanFull(),
        ]);
}
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                ->defaultImageUrl(url('storage/default/default-image.png')),

                TextColumn::make('title')
                ->searchable()
                ->limit(30),

                TextColumn::make('content')
                ->label('Content')
                ->limit(35),

                TextColumn::make('category.name')
                ->label('Category')
                ->sortable()
                ->searchable(),

                TextColumn::make('user.name')
                ->label('Author')
                ->sortable()
                ->searchable(),

                TextColumn::make('post_views')
                ->label('View Count')
                ->sortable(),

                IconColumn::make('is_visible')
                ->sortable()
                ->toggleable()
                ->label('Visibility')
                ->boolean(),

                TextColumn::make('start_date')->label('Start Date')->date(),

                TextColumn::make('end_date')->label('End Date')->date(),

                TextColumn::make('created_at')->label('Created At')->date(),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ])
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
