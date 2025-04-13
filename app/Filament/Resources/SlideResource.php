<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SlideResource\Pages;
use App\Filament\Resources\SlideResource\RelationManagers;
use App\Models\Slide;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\RestoreAction;
use Filament\Tables\Actions\ForceDeleteAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class SlideResource extends Resource
{
    protected static ?string $model = Slide::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';

    protected static ?string $navigationGroup = 'Manajemen Konten';

    public static function getNavigationBadge(): ?string
    {
        $model = static::getModel();

        if (!Auth::user()->hasRole(['super_admin', 'admin'], 'web')) {
            $unpublishedCount = $model::where('user_id', Auth::id())->withoutTrashed()->count();
        }

        $unpublishedCount = $model::where('published', '0')->withoutTrashed()->count();

        return $unpublishedCount > 0
            ? $unpublishedCount
            : $model::where('published', '1')->withoutGlobalScopes([SoftDeletingScope::class])->withoutTrashed()->count();
    }

    public static function getNavigationBadgeTooltip(): ?string
    {
        $model = static::getModel();
        if (!Auth::user()->hasRole(['super_admin', 'admin'], 'web')) {
            $unpublishedCount = $model::where('user_id', Auth::id())->withoutTrashed()->count();
        }

        $unpublishedCount = $model::where('published', '0')->withoutTrashed()->count();

        return $unpublishedCount > 0
            ? 'Belum Dipublikasikan'
            : 'Dipublikasikan';
    }

    public static function getNavigationBadgeColor(): ?string
    {
        $model = static::getModel();
        if (!Auth::user()->hasRole(['super_admin', 'admin'], 'web')) {
            $unpublishedCount = $model::where('user_id', Auth::id())->withoutTrashed()->count();
        }

        $unpublishedCount = $model::where('published', '0')->withoutTrashed()->count();

        return $unpublishedCount > 0 ? 'warning' : 'success';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Informasi Slide')
                    ->description('Isi detail utama mengenai slide')
                    ->schema([
                        TextInput::make('title')
                            ->label('Judul')
                            ->placeholder('Masukkan judul slide')
                            ->required()
                            ->columnSpanFull(),

                        Textarea::make('description')
                            ->label('Deskripsi')
                            ->placeholder('Masukkan deskripsi slide')
                            ->rows(4)
                            ->helperText('Berikan deskripsi yang jelas dan lengkap')
                            ->columnSpanFull(),
                    ])
                    ->columns(1)
                    ->collapsible(),

                Section::make('Unggah Gambar')
                    ->description('Lampirkan gambar untuk slide ini')
                    ->schema([
                        FileUpload::make('image')
                            ->label('Unggah Gambar')
                            ->image()
                            ->maxSize(5120)
                            ->directory('uploads/slides')
                            ->imagePreviewHeight('150')
                            ->columnSpanFull(),
                    ])
                    ->columns(1)
                    ->collapsible(),

                Section::make('Visibilitas')
                    ->schema([
                        Toggle::make('published')
                            ->label('Tampilkan')
                            ->default(true)
                            ->helperText('Tandai jika ingin slide ini ditampilkan'),
                    ])
                    ->columns(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')->toggleable(),
                TextColumn::make('title')
                    ->label('Judul')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                ToggleColumn::make('published')
                    ->label('Tampilkan')
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('created_at')
                    ->label('Dibuat Pada')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
            ])
            ->filters([
                TrashedFilter::make()->label('Termasuk yang Dihapus'),
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
                        ->label('Ubah'),
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
                        ->icon('heroicon-o-trash')
                        ->label('Hapus Massal'),
                    Tables\Actions\RestoreBulkAction::make()
                        ->color('success')
                        ->icon('heroicon-o-arrow-path')
                        ->label('Pulihkan Massal'),
                    Tables\Actions\ForceDeleteBulkAction::make()
                        ->color('danger')
                        ->icon('heroicon-o-trash')
                        ->label('Hapus Permanen Massal'),
                ]),
            ])->modifyQueryUsing(function (Builder $query) {
                $query->orderBy('created_at', 'desc')
                    ->withoutGlobalScopes([SoftDeletingScope::class]);
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
            'index' => Pages\ListSlides::route('/'),
            'create' => Pages\CreateSlide::route('/buat'),
            'edit' => Pages\EditSlide::route('/{record}/ubah'),
        ];
    }
}
