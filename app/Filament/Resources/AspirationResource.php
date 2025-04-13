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
use App\AspirationType;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\FileUpload;
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
    protected static ?string $navigationGroup = 'Manajemen Konten';
    protected static ?string $breadcrumb = 'Berita';
    protected static ?string $slug = 'berita';
    protected static ?string $label = 'Berita';

    public static function getNavigationLabel(): string
    {
        return 'Berita';
    }

    public static function getPluralLabel(): string
    {
        return 'Berita';
    }

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

        return $unpublishedCount > 0 ? 'Belum Dipublikasikan' : 'Sudah Dipublikasikan';
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
                // BAGIAN: Informasi Meta
                Section::make('Informasi Meta')
                    ->description('Isi detail umum aspirasi')
                    ->schema([
                        Hidden::make('user_id')
                            ->default(Auth::id())
                            ->required(),

                        Grid::make(2)->schema([
                            TextInput::make('title')
                                ->label('Judul')
                                ->placeholder('Masukkan judul aspirasi')
                                ->required(),

                            TextInput::make('description')
                                ->label('Deskripsi Singkat')
                                ->placeholder('Maksimal 255 karakter')
                                ->maxLength(255)
                                ->required(),
                        ]),
                    ])
                    ->columns(1)
                    ->collapsible(),

                // BAGIAN: Konten Aspirasi
                Section::make('Konten')
                    ->description('Tulis konten lengkap dari aspirasi Anda')
                    ->schema([
                        FileUpload::make('thumbnail')
                            ->label('Thumbnail')
                            ->image()
                            ->directory('blogs')
                            ->columnSpanFull(),
                        TinyEditor::make('body')
                            ->label('Isi Konten')
                            ->fileAttachmentsDisk('public')
                            ->fileAttachmentsVisibility('public')
                            ->fileAttachmentsDirectory('uploads')
                            ->profile('full') // gunakan 'simple' untuk tampilan lebih bersih
                            ->ltr()
                            ->required()
                            ->columnSpanFull(),
                    ])
                    ->columns(1)
                    ->collapsible(),

                // BAGIAN: Kategori & Unit
                Section::make('Klasifikasi')
                    ->description('Kategorikan aspirasi dengan tepat')
                    ->schema([
                        Grid::make(['default' => 1, 'md' => 4])->schema([
                            Select::make('category_id')
                                ->label('Kategori')
                                ->options(Category::pluck('name', 'id'))
                                ->searchable()
                                ->required(),

                            Select::make('unit_id')
                                ->label('Unit')
                                ->options(Unit::pluck('name', 'id'))
                                ->searchable()
                                ->required(),

                            Select::make('type')
                                ->label('Tipe')
                                ->options(collect(AspirationType::cases())->mapWithKeys(fn($case) => [$case->value => $case->label()]))
                                ->searchable()
                                ->required(),
                            TagsInput::make('tags')
                                ->label('Tag')
                                ->required(),
                        ]),
                    ])
                    ->columns(1)
                    ->collapsible(),

                // BAGIAN: Toggle Publikasi
                Section::make('Visibilitas')
                    ->description('Kontrol apakah aspirasi & komentar ini terlihat oleh pengguna')
                    ->schema([
                        Toggle::make('published')
                            ->label('Dipublikasikan')
                            ->inline()
                            ->required()
                            ->visible(fn() => Auth::user()->hasRole(['super_admin', 'admin'], 'web')),
                        Toggle::make('comments_enabled')
                            ->label('Komentar Diaktifkan')
                            ->default(1)
                            ->inline()
                            ->required()
                    ])
                    ->columns(1)
                    ->collapsed(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('author.name')
                    ->label('Penulis')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),

                ToggleColumn::make('published')
                    ->label('Dipublikasikan')
                    ->sortable()
                    ->disabled(fn() => !Auth::user()->hasRole(['super_admin', 'admin'], 'web'))
                    ->toggleable(),

                ToggleColumn::make('comments_enabled')
                    ->label('Komentar Diaktifkan')
                    ->sortable()
                    ->toggleable(),

                TextColumn::make('title')
                    ->label('Judul')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),

                TextColumn::make('slug')
                    ->label('Slug')
                    ->sortable()
                    ->copyable()
                    ->toggleable(),

                TextColumn::make('category.name')
                    ->label('Kategori')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),

                TextColumn::make('type')
                    ->label('Tipe')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
            ])
            ->filters([
                TrashedFilter::make()
                    ->label('Data Terhapus'),
                SelectFilter::make('user_id')
                    ->label('Penulis')
                    ->searchable()
                    ->options(User::pluck('name', 'id')),
                SelectFilter::make('category_id')
                    ->label('Kategori')
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
                        ->icon('heroicon-o-eye')
                        ->label('Lihat'),
                    EditAction::make()
                        ->color('warning')
                        ->icon('heroicon-o-pencil')
                        ->label('Edit'),
                    DeleteAction::make()
                        ->color('danger')
                        ->icon('heroicon-o-trash')
                        ->label('Hapus'),
                ]),
                RestoreAction::make()
                    ->color('success')
                    ->icon('heroicon-o-arrow-path')
                    ->label('Pulihkan'),
                ForceDeleteAction::make()
                    ->color('danger')
                    ->icon('heroicon-o-trash')
                    ->label('Hapus Permanen'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->color('danger')
                        ->label('Hapus'),
                    Tables\Actions\RestoreBulkAction::make()
                        ->color('success')
                        ->label('Pulihkan'),
                    Tables\Actions\ForceDeleteBulkAction::make()
                        ->color('danger')
                        ->label('Hapus Permanen'),
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
            'create' => Pages\CreateAspiration::route('/tambah'),
            'edit' => Pages\EditAspiration::route('/{record}/ubah'),
        ];
    }
}
