<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Models\User;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\RestoreAction;
use Filament\Tables\Actions\ForceDeleteAction;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\{Grid, Hidden, TextInput, RichEditor, FileUpload, Select, Toggle, Textarea, TagsInput};
use App\Models\{Post, Category, Unit};

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-arrow-up-on-square-stack';

    protected static ?string $navigationGroup = 'Content Management';

    public static function getNavigationBadge(): ?string
    {
        $model = static::getModel();

        // Hitung jumlah unpublished
        $unpublishedCount = $model::where('published', '0')->withoutGlobalScopes([SoftDeletingScope::class])->count();

        // Jika tidak ada unpublished, tampilkan jumlah published
        return $unpublishedCount > 0
            ? $unpublishedCount
            : $model::where('published', '1')->withoutGlobalScopes([SoftDeletingScope::class])->count();
    }

    public static function getNavigationBadgeTooltip(): ?string
    {
        $model = static::getModel();
        $unpublishedCount = $model::where('published', '0')->withoutGlobalScopes([SoftDeletingScope::class])->count();

        return $unpublishedCount > 0
            ? 'Unpublished'
            : 'Published';
    }

    public static function getNavigationBadgeColor(): ?string
    {
        $model = static::getModel();
        $unpublishedCount = $model::where('published', '0')->withoutGlobalScopes([SoftDeletingScope::class])->count();

        return $unpublishedCount > 0 ? 'warning' : 'success';
    }


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(2)
                    ->schema([
                        Hidden::make('user_id')
                            ->default(Auth::id())
                            ->required(),

                        TextInput::make('title')
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(function (callable $set, callable $get, $state) {
                                $slug = Str::slug($state);
                                $originalSlug = $slug;
                                $count = 1;

                                $postId = $get('id');

                                while (Post::where('slug', $slug)->where('id', '!=', $postId)->exists()) {
                                    $slug = "{$originalSlug}-{$count}";
                                    $count++;
                                }

                                $set('slug', $slug);
                            }),

                        TextInput::make('slug')
                            ->required()
                            ->unique(Post::class, 'slug', ignoreRecord: true)
                            ->readOnly(),
                    ]),

                // Perbaikan utama: Pastikan RichEditor memiliki name 'body' yang sesuai dengan kolom di database
                RichEditor::make('body')
                    ->required()
                    ->columnSpanFull(),

                Textarea::make('description')
                    ->required()
                    ->columnSpanFull()
                    ->maxLength(255),

                Grid::make(2)
                    ->schema([
                        FileUpload::make('image')
                            ->image()
                            ->directory('posts')
                            ->columnSpan(['md' => 2, 'lg' => 2, 'xl' => 2, 'default' => 2]),

                        Select::make('category_id')
                            ->label('Category')
                            ->options(Category::pluck('name', 'id'))
                            ->searchable()
                            ->required()
                            ->columnSpan(['md' => 1, 'lg' => 1, 'xl' => 1, 'default' => 2]),

                        Select::make('unit_id')
                            ->label('Unit')
                            ->options(Unit::pluck('name', 'id'))
                            ->searchable()
                            ->required()
                            ->columnSpan(['md' => 1, 'lg' => 1, 'xl' => 1, 'default' => 2]),
                    ]),

                TagsInput::make('tags')
                    ->placeholder('#example, #tag')
                    ->columnSpanFull(),

                Toggle::make('published')
                    ->label('Published')
                    ->default(false)
                    ->columnSpan(['md' => 1, 'lg' => 1, 'xl' => 1, 'default' => 2])
                    ->visible(fn() => Auth::user()->hasRole(['super_admin', 'admin'], 'web'))
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->toggleable(),

                TextColumn::make('author.name')
                    ->label('Author')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),


                ToggleColumn::make('published')
                    ->label('Published')
                    ->sortable()
                    ->toggleable(),

                TextColumn::make('title')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),

                TextColumn::make('slug')
                    ->sortable()
                    ->copyable()
                    ->toggleable(),

                TextColumn::make('category.name')
                    ->label('Category')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),

                TextColumn::make('unit.name')
                    ->label('Unit')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),

                TextColumn::make('tags')
                    ->limit(50)
                    ->toggleable(),
            ])
            ->filters([
                SelectFilter::make('published')
                    ->label('Published')
                    ->options([
                        '1' => 'Published',
                        '0' => 'Unpublished',
                    ])
                    ->searchable(),
                TrashedFilter::make(),
                SelectFilter::make('author_id')
                    ->label('Author')
                    ->searchable()
                    ->options(User::pluck('name', 'id')),
                SelectFilter::make('category_id')
                    ->label('Category')
                    ->searchable()
                    ->options(Category::pluck('name', 'id')),
                SelectFilter::make('unit_id')
                    ->label('Unit')
                    ->searchable()
                    ->options(Unit::pluck('name', 'id')),

            ])
            ->actions([
                ActionGroup::make([
                    ViewAction::make()
                        ->color('info')
                        ->icon('heroicon-o-eye'),
                    EditAction::make()
                        ->color('primary')
                        ->icon('heroicon-o-pencil'),
                    DeleteAction::make()
                        ->color('danger')
                        ->icon('heroicon-o-trash'),
                ]),
                RestoreAction::make()
                    ->color('warning')
                    ->icon('heroicon-o-arrow-path'),
                ForceDeleteAction::make()
                    ->color('danger')
                    ->icon('heroicon-o-trash'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                ]),
            ])
            ->modifyQueryUsing(function (Builder $query) {
                if (!Auth::user()->hasRole(['super_admin', 'admin'], 'web')) {
                    $query->where('user_id', Auth::id());
                }

                // Pastikan tidak memfilter hanya untuk published = 0
                $query->withoutGlobalScopes([SoftDeletingScope::class])
                    ->orderBy('created_at', 'DESC');
            });

    }

    public static function getRelations(): array
    {
        return [];
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
