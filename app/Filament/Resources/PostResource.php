<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Models\Category;
use App\Models\User;
use App\Models\Post;
use App\Models\Unit;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
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

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationGroup = 'Content Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Hidden::make('user_id')
                    ->default(Auth::id())
                    ->disabled(fn() => Auth::user()->hasRole('super_admin'))
                    ->required(),

                TextInput::make('title')
                    ->required()
                    ->lazy()
                    ->afterStateUpdated(function (callable $set, callable $get, $state) {
                        $slug = Str::slug($state);
                        $originalSlug = $slug;
                        $count = 1;

                        // Cek apakah sedang dalam mode edit dengan melihat apakah ada 'id'
                        $postId = $get('id');

                        while (Post::where('slug', $slug)->where('id', '!=', $postId)->exists()) {
                            $slug = "{$originalSlug}-{$count}";
                            $count++;
                        }

                        $set('slug', $slug);
                    }),

                TextInput::make('slug')
                    ->unique(Post::class, 'slug', ignoreRecord: true) // Abaikan validasi unik jika sedang mengedit
                    ->required()
                    ->readOnly(),


                RichEditor::make('body')
                    ->required()
                    ->columnSpanFull(),

                FileUpload::make('image')
                    ->image()
                    ->directory('posts')
                    ->columnSpan(2),

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

                TextInput::make('tags')
                    ->placeholder('#example, #tag')
                    ->columnSpanFull(),

                Forms\Components\Toggle::make('published')
                    ->label('Published')
                    ->default(false),
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
                if (!Auth::user()->hasRole('super_admin')) {
                    $query->where('user_id', Auth::id());
                }
                $query->withoutGlobalScopes([SoftDeletingScope::class]);
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
