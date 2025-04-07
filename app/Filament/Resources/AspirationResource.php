<?php

namespace App\Filament\Resources;

use AmidEsfahani\FilamentTinyEditor\TinyEditor;
use App\Filament\Resources\AspirationResource\Pages;
use App\Filament\Resources\AspirationResource\RelationManagers;
use App\Filament\Resources\CommentRelationManagerResource\RelationManagers\CommentsRelationManager;
use App\Models\Aspiration;
use App\Models\Category;
use App\Models\Unit;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Section;
// use Filament\Forms\Components\RichEditor;
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

    public static function getWidgets(): array
    {
        return [
            AspirationResource\Widgets\AspirationOverview::class,
        ];
    }

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
                // SECTION: Meta Information
                Section::make('Meta Information')
                    ->description('Fill in the general aspiration details')
                    ->schema([
                        Hidden::make('user_id')
                            ->default(Auth::id())
                            ->required(),

                        Grid::make(2)->schema([
                            TextInput::make('title')
                                ->label('Title')
                                ->placeholder('Enter aspiration title')
                                ->required(),

                            TextInput::make('description')
                                ->label('Short Description')
                                ->placeholder('Max 255 characters')
                                ->maxLength(255)
                                ->required(),
                        ]),
                    ])
                    ->columns(1)
                    ->collapsible(),

                // SECTION: aspiration Content
                Section::make('Content')
                    ->description('Write the full content of your aspiration')
                    ->schema([
                        TinyEditor::make('body')
                            ->label('Body Content')
                            ->fileAttachmentsDisk('public')
                            ->fileAttachmentsVisibility('public')
                            ->fileAttachmentsDirectory('uploads')
                            ->profile('full') // use 'simple' if you want it cleaner
                            ->ltr()
                            ->required()
                            ->columnSpanFull(),
                    ])
                    ->columns(1)
                    ->collapsible(),

                // SECTION: Category & Unit
                Section::make('Classification')
                    ->description('Categorize the aspiration appropriately')
                    ->schema([
                        Grid::make(['default' => 1, 'md' => 2])->schema([
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
                    ->columns(1)
                    ->collapsible(),

                // SECTION: Publish Toggle
                Section::make('Visibility')
                    ->description('Control whether this aspiration & comments is visible to users')
                    ->schema([
                        Toggle::make('published')
                            ->label('Published')
                            ->default(1)
                            ->inline()
                            ->required()
                            ->visible(fn() => Auth::user()->hasRole(['super_admin', 'admin'], 'web')),
                        Toggle::make('comments_enabled')
                            ->label('Comments enabled')
                            ->default(1)
                            ->inline()
                            ->required()
                    ])
                    ->columns(1)
                    ->visible(fn() => Auth::user()->hasRole(['super_admin', 'admin'], 'web'))
                    ->collapsed(),
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
                    ->disabled(fn() => !Auth::user()->hasRole(['super_admin', 'admin'], 'web'))
                    ->toggleable(),

                ToggleColumn::make('comments_enabled')
                    ->label('Comments enabled')
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
                SelectFilter::make('user_id')
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
