<?php

namespace App\Filament\Resources;

use AmidEsfahani\FilamentTinyEditor\TinyEditor;
use App\Filament\Resources\PpdbResource\Pages;
use App\Filament\Resources\PpdbResource\RelationManagers;
use App\Models\Ppdb;
use App\Models\Unit;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ForceDeleteAction;
use Filament\Tables\Actions\RestoreAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PpdbResource extends Resource
{
    protected static ?string $model = Ppdb::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    protected static ?string $navigationGroup = 'Manajemen Konten';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Identitas Instansi')
                    ->schema([
                        FileUpload::make('image')
                            ->label('Unggah Logo')
                            ->image()
                            ->directory('logos')
                            ->required()
                            ->columnSpanFull(),

                        TextInput::make('name')
                            ->label('Nama Instansi')
                            ->placeholder('Masukkan nama instansi')
                            ->required(),

                        Select::make('unit_id')
                            ->label('Unit')
                            ->options(Unit::pluck('name', 'id'))
                            ->searchable()
                            ->required(),
                    ])
                    ->columns(1),

                Section::make('Deskripsi')
                    ->schema([
                        TinyEditor::make('content')
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
                ImageColumn::make('image')
                    ->label('Logo')
                    ->circular()
                    ->toggleable(),

                TextColumn::make('name')
                    ->label('Nama instansi')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),

                TextColumn::make('slug')
                    ->label('Slug')
                    ->sortable()
                    ->copyable()
                    ->toggleable(),

                TextColumn::make('content')
                    ->label('Deskripsi')
                    ->limit(50)
                    ->toggleable(),

                TextColumn::make('unit.name')
                    ->label('Unit')
                    ->limit(50)
                    ->toggleable(),

            ])
            ->filters([
                TrashedFilter::make()
                    ->label('Data Terhapus'),
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
                    RestoreAction::make()
                        ->color('success')
                        ->icon('heroicon-o-arrow-path')
                        ->label('Pulihkan'),
                    ForceDeleteAction::make()
                        ->color('danger')
                        ->icon('heroicon-o-trash')
                        ->label('Hapus Permanen'),
                ]),
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
            'index' => Pages\ListPpdbs::route('/'),
            'create' => Pages\CreatePpdb::route('/tambah'),
            'edit' => Pages\EditPpdb::route('/{record}/ubah'),
        ];
    }
}
