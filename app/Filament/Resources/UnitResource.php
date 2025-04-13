<?php

namespace App\Filament\Resources;

use AmidEsfahani\FilamentTinyEditor\TinyEditor;
use App\Filament\Resources\UnitResource\Pages;
use App\Models\Unit;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
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
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Support\Str;

class UnitResource extends Resource
{
    protected static ?string $model = Unit::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office';

    protected static ?string $navigationGroup = 'Data Master';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Identitas Unit')
                    ->schema([
                        FileUpload::make('logo')
                            ->label('Unggah Logo')
                            ->image()
                            ->directory('logos')
                            ->required()
                            ->columnSpanFull(),

                        TextInput::make('name')
                            ->label('Nama Unit')
                            ->placeholder('Masukkan nama unit')
                            ->required()
                            ->columnSpanFull(),
                    ])
                    ->columns(1),

                Section::make('Deskripsi')
                    ->schema([
                        TinyEditor::make('description')
                            ->label('Deskripsi Lengkap')
                            ->fileAttachmentsDisk('public')
                            ->fileAttachmentsVisibility('public')
                            ->fileAttachmentsDirectory('uploads')
                            ->profile('full')
                            ->ltr()
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

                ImageColumn::make('logo')
                    ->label('Logo')
                    ->circular()
                    ->toggleable(),

                TextColumn::make('name')
                    ->label('Nama Unit')
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
                TrashedFilter::make()
                    ->label('Tampilkan yang Dihapus'),
            ])
            ->actions([
                ActionGroup::make([
                    ViewAction::make()
                        ->label('Lihat')
                        ->color('info')
                        ->icon('heroicon-o-eye'),

                    EditAction::make()
                        ->label('Edit')
                        ->color('primary')
                        ->icon('heroicon-o-pencil'),

                    DeleteAction::make()
                        ->label('Hapus')
                        ->color('danger')
                        ->icon('heroicon-o-trash'),
                ]),

                RestoreAction::make()
                    ->label('Pulihkan')
                    ->color('warning')
                    ->icon('heroicon-o-arrow-path'),

                ForceDeleteAction::make()
                    ->label('Hapus Permanen')
                    ->color('danger')
                    ->icon('heroicon-o-trash'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()->label('Hapus Massal'),
                    Tables\Actions\RestoreBulkAction::make()->label('Pulihkan Massal'),
                    Tables\Actions\ForceDeleteBulkAction::make()->label('Hapus Permanen Massal'),
                ]),
            ])
            ->modifyQueryUsing(fn(Builder $query) =>
                $query->orderBy('created_at', 'DESC')->withoutGlobalScopes([
                    SoftDeletingScope::class,
                ])
            );
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUnits::route('/'),
            'create' => Pages\CreateUnit::route('/create'),
            'edit' => Pages\EditUnit::route('/{record}/edit'),
        ];
    }
}
