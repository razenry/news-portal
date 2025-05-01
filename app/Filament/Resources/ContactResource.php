<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactResource\Pages;
use App\Models\Contact;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\RestoreAction;
use Filament\Tables\Actions\ForceDeleteAction;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ContactResource extends Resource
{
    protected static ?string $model = Contact::class;

    protected static ?string $navigationIcon = 'heroicon-o-phone';

    protected static ?string $navigationGroup = 'Manajemen Konten';

    protected static ?string $navigationLabel = 'Kontak';

    protected static ?string $breadcrumb = 'Kontak';
    protected static ?string $label = 'Kontak';
    protected static ?string $slug = 'kontak';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Informasi Kontak')
                    ->schema([
                        TextInput::make('name')
                            ->label('Nama Kontak')
                            ->placeholder('Masukkan nama kontak')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('link')
                            ->label('Link Kontak')
                            ->placeholder('Masukkan URL atau alamat kontak')
                            ->required()
                            ->maxLength(255),

                        Select::make('type')
                            ->label('Tipe Kontak')
                            ->options([
                                'phone' => 'Telepon',
                                'email' => 'Email',
                                'social_media' => 'Sosial Media',
                            ])
                            ->required()
                            ->default('phone'),
                    ])
                    ->columns(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nama Kontak')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),

                TextColumn::make('link')
                    ->label('Link Kontak')
                    ->copyable()
                    ->limit(30)
                    ->toggleable(),

                TextColumn::make('type')
                    ->label('Tipe')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'phone' => 'info',
                        'email' => 'success',
                        'social_media' => 'warning',
                        default => 'gray',
                    })
                    ->toggleable(),
            ])
            ->filters([
                TrashedFilter::make()->label('Tampilkan yang Dihapus'),
            ])
            ->actions([
                ActionGroup::make([
                    ViewAction::make()->label('Lihat'),
                    EditAction::make()->label('Edit'),
                    DeleteAction::make()->label('Hapus'),
                ]),
                RestoreAction::make()->label('Pulihkan'),
                ForceDeleteAction::make()->label('Hapus Permanen'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()->label('Hapus Massal'),
                    Tables\Actions\RestoreBulkAction::make()->label('Pulihkan Massal'),
                    Tables\Actions\ForceDeleteBulkAction::make()->label('Hapus Permanen Massal'),
                ]),
            ])
            ->modifyQueryUsing(fn (Builder $query) =>
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
            'index' => Pages\ListContacts::route('/'),
            'create' => Pages\CreateContact::route('/create'),
            'edit' => Pages\EditContact::route('/{record}/edit'),
        ];
    }
}
