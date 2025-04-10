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
use Filament\Forms\Components\{Grid, TextInput, Textarea, FileUpload, Toggle, Select, Hidden, TagsInput, Section};

use AmidEsfahani\FilamentTinyEditor\TinyEditor;
use App\Models\{Post, Category, Unit};

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-arrow-up-on-square-stack';

    protected static ?string $navigationGroup = 'Content Management';

    public static function getNavigationBadge(): ?string
    {
        $model = static::getModel();

        // Ambil user yang sedang login
        $user = Auth::user();

        if (!$user->hasRole(['super_admin', 'admin'], 'web')) {
            // Jika bukan admin, hanya hitung data miliknya
            $unpublishedCount = $model::where('user_id', $user->id)
                ->where('published', '0')
                ->withoutTrashed()->count();
            $publishedCount = $model::where('user_id', $user->id)
                ->where('published', '1')
                ->withoutTrashed()->count();
        } else {
            // Jika admin, hitung semua data
            $unpublishedCount = $model::where('published', '0')->withoutTrashed()->count();
            $publishedCount = $model::where('published', '1')
                ->withoutTrashed()->count();
        }

        // Jika tidak ada unpublished, tampilkan jumlah published
        return $unpublishedCount > 0 ? $unpublishedCount : $publishedCount;
    }

    public static function getNavigationBadgeTooltip(): ?string
    {
        $model = static::getModel();
        $user = Auth::user();

        if (!$user->hasRole(['super_admin', 'admin'], 'web')) {
            $unpublishedCount = $model::where('user_id', $user->id)
                ->where('published', '0')
                ->withoutTrashed()->count();
        } else {
            $unpublishedCount = $model::where('published', '0')->withoutTrashed()->count();
        }

        return $unpublishedCount > 0 ? 'Unpublished' : 'Published';
    }

    public static function getNavigationBadgeColor(): ?string
    {
        $model = static::getModel();
        $user = Auth::user();

        if (!$user->hasRole(['super_admin', 'admin'], 'web')) {
            $unpublishedCount = $model::where('user_id', $user->id)
                ->where('published', '0')
                ->withoutTrashed()->count();
        } else {
            $unpublishedCount = $model::where('published', '0')->withoutTrashed()->count();
        }

        return $unpublishedCount > 0 ? 'warning' : 'success';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Section::make('Meta Data')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                Hidden::make('user_id')
                                    ->default(Auth::id())
                                    ->required(),

                                TextInput::make('title')
                                    ->label('Post Title')
                                    ->placeholder('Enter post title')
                                    ->required()
                                    ->columnSpan(2),
                            ]),
                    ])
                    ->columns(1),

                Section::make('Content')
                    ->schema([
                        TinyEditor::make('body')
                            ->label('Content')
                            ->fileAttachmentsDisk('public')
                            ->fileAttachmentsVisibility('public')
                            ->fileAttachmentsDirectory('uploads')
                            ->profile('full')
                            ->ltr()
                            ->required()
                            ->columnSpanFull(),
                    ])
                    ->columns(1),

                Section::make('Description')
                    ->schema([
                        Textarea::make('description')
                            ->label('Short Description')
                            ->placeholder('Write a short summary...')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),
                    ])
                    ->columns(1),

                Section::make('Media & Classification')
                    ->schema([
                        FileUpload::make('image')
                            ->label('Featured Image')
                            ->image()
                            ->directory('posts')
                            ->columnSpanFull(),

                        Grid::make(['default' => 2, 'md' => 2])
                            ->schema([
                                Select::make('category_id')
                                    ->label('Category')
                                    ->options(Category::pluck('name', 'id'))
                                    ->searchable()
                                    ->required(),

                                Select::make('unit_id')
                                    ->label('Unit')
                                    ->options(Unit::pluck('name', 'id'))
                                    ->searchable()
                                    ->required(),
                            ]),
                    ])
                    ->columns(1),

                Section::make('Tags & Visibility')
                    ->schema([
                        TagsInput::make('tags')
                            ->placeholder('Add tags like news, update')
                            ->label('Tags')
                            ->columnSpanFull(),

                        Toggle::make('published')
                            ->label('Published')
                            ->default(false)
                            ->visible(fn() => Auth::user()->hasRole(['super_admin', 'admin'], 'web'))
                            ->columnSpan(1),
                    ])
                    ->columns(1),
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
                    ->disabled(fn() => !Auth::user()->hasRole(['super_admin', 'admin'], 'web'))
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
                        ->color('warning')
                        ->icon('heroicon-o-pencil'),
                    DeleteAction::make()
                        ->color('danger')
                        ->icon('heroicon-o-trash'),
                ]),
                RestoreAction::make()
                    ->color('success')
                    ->icon('heroicon-o-arrow-path'),
                ForceDeleteAction::make()
                    ->color('danger')
                    ->icon('heroicon-o-trash'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                    ->color('danger')
                    ->icon('heroicon-o-trash'),
                    Tables\Actions\RestoreBulkAction::make()
                    ->color('success')
                    ->icon('heroicon-o-arrow-path'),
                    Tables\Actions\ForceDeleteBulkAction::make()
                    ->color('danger')
                    ->icon('heroicon-o-trash'),
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
