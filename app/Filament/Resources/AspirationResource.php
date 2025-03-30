<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AspirationResource\Pages;
use App\Filament\Resources\AspirationResource\RelationManagers;
use App\Models\Aspiration;
use App\Models\Category;
use App\Models\Unit;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ForceDeleteAction;
use Filament\Tables\Actions\RestoreAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class AspirationResource extends Resource
{
    protected static ?string $model = Aspiration::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-bottom-center-text';

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
                Hidden::make('user_id')
                    ->default(Auth::id())
                    ->required(),
                TextInput::make('title')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(function (callable $set, callable $get, $state) {
                        $slug = \Illuminate\Support\Str::slug($state);
                        $originalSlug = $slug;
                        $count = 1;

                        $aspirationId = $get('id');

                        while (Aspiration::where('slug', $slug)->where('id', '!=', $aspirationId)->exists()) {
                            $slug = "{$originalSlug}-{$count}";
                            $count++;
                        }

                        $set('slug', $slug);
                    })
                    ->columnSpan(2),
                TextInput::make('slug')
                    ->required()
                    ->unique(Aspiration::class, 'slug', ignoreRecord: true)
                    ->readOnly()
                    ->columnSpan(2),
                TextInput::make('description')
                    ->required()
                    ->maxLength(255)
                    ->columnSpan(2),
                RichEditor::make('body')
                    ->required()
                    ->columnSpan(2),
                Grid::make(2)
                    ->schema([

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
                    ])->columnSpanFull(),

                Toggle::make('published')
                    ->label('Published')
                    ->default(1)
                    ->inline()
                    ->required()
                    ->visible(fn() => Auth::user()->hasRole(['super_admin', 'admin'], 'web'))
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
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
                if (!Auth::user()->hasRole(['super_admin', 'admin'], 'web')) {
                    $query->where('user_id', Auth::id())->orderBy('created_at', 'DESC');
                }
                $query->withoutGlobalScopes([SoftDeletingScope::class])->orderBy('created_at', 'DESC');
            });
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
            'index' => Pages\ListAspirations::route('/'),
            'create' => Pages\CreateAspiration::route('/create'),
            'edit' => Pages\EditAspiration::route('/{record}/edit'),
        ];
    }
}
