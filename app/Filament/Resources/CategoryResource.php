<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\RestoreAction;
use Filament\Tables\Actions\ForceDeleteAction;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = 'heroicon-o-tag';

    protected static ?string $navigationGroup = 'Data Master';
    protected static ?string $breadcrumb = 'Kategori';
    protected static ?string $slug = 'kategori';
    protected static ?string $label = 'Kategori';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Informasi Kategori')
                    ->description('Isi detail kategori di bawah ini.')
                    ->schema([
                        TextInput::make('name')
                            ->label('Nama Kategori')
                            ->placeholder('contoh: Teknologi, Makanan, dll.')
                            ->required()
                            ->columnSpanFull(),

                        FileUpload::make('icon')
                            ->label('Ikon Kategori')
                            ->image()
                            ->imagePreviewHeight('100')
                            ->directory('ikon-kategori')
                            ->required()
                            ->columnSpanFull(),
                    ])
                    ->columns(1),

                Section::make('Deskripsi')
                    ->collapsible()
                    ->schema([
                        RichEditor::make('description')
                            ->label('Deskripsi Kategori')
                            ->required()
                            ->columnSpanFull(),
                    ])
                    ->columns(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('icon')
                    ->label('Ikon')
                    ->circular()
                    ->toggleable(),

                TextColumn::make('name')
                    ->label('Nama')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),

                TextColumn::make('slug')
                    ->label('Slug')
                    ->sortable()
                    ->copyable()
                    ->toggleable(),

                TextColumn::make('description')
                    ->label('Deskripsi')
                    ->limit(50)
                    ->toggleable(),
            ])
            ->filters([
                TrashedFilter::make()->label('Tampilkan yang Dihapus'),
            ])
            ->actions([
                ActionGroup::make([
                    ViewAction::make()
                        ->label('Lihat')
                        ->color('info')
                        ->icon('heroicon-o-eye'),
                    EditAction::make()
                        ->label('Ubah')
                        ->color('warning')
                        ->icon('heroicon-o-pencil'),
                    DeleteAction::make()
                        ->label('Hapus')
                        ->color('danger')
                        ->icon('heroicon-o-trash'),
                ]),
                RestoreAction::make()
                    ->label('Pulihkan')
                    ->color('success')
                    ->icon('heroicon-o-arrow-path'),
                ForceDeleteAction::make()
                    ->label('Hapus Permanen')
                    ->color('danger')
                    ->icon('heroicon-o-trash'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->label('Hapus Massal')
                        ->color('danger')
                        ->icon('heroicon-o-trash'),
                    Tables\Actions\RestoreBulkAction::make()
                        ->label('Pulihkan Massal')
                        ->color('success')
                        ->icon('heroicon-o-arrow-path'),
                    Tables\Actions\ForceDeleteBulkAction::make()
                        ->label('Hapus Permanen Massal')
                        ->color('danger')
                        ->icon('heroicon-o-trash'),
                ]),
            ])
            ->modifyQueryUsing(fn(Builder $query) => $query->orderBy('created_at', 'DESC')->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]));
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/tambah'),
            'edit' => Pages\EditCategory::route('/{record}/ubah'),
        ];
    }
}
