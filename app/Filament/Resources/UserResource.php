<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
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
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationGroup = 'Manajemen Pengguna';

    protected static ?string $label = 'Pengguna';

    protected static ?string $slug = 'pengguna';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Informasi Pengguna')
                    ->description('Detail dasar tentang pengguna')
                    ->schema([
                        Grid::make(2)->schema([
                            TextInput::make('name')
                                ->label('Nama Lengkap')
                                ->required(),

                            TextInput::make('email')
                                ->label('Alamat Email')
                                ->email()
                                ->required(),
                        ]),
                    ])
                    ->columns(1)
                    ->collapsible(),

                Section::make('Keamanan')
                    ->description('Opsi keamanan akun')
                    ->schema([
                        TextInput::make('password')
                            ->label('Kata Sandi')
                            ->password()
                            ->default(fn($record) => $record ? null : '12345')
                            ->required(fn($record) => is_null($record))
                            ->dehydrated(fn($state) => !empty($state))
                            ->helperText(fn($record) => $record ? 'Biarkan kosong untuk mempertahankan kata sandi saat ini' : 'Kata sandi default adalah 12345'),
                    ])
                    ->columns(1)
                    ->collapsible(),

                Section::make('Peran & Izin')
                    ->description('Tetapkan peran kepada pengguna')
                    ->schema([
                        Select::make('roles')
                            ->label('Peran')
                            ->relationship('roles', 'name')
                            ->multiple()
                            ->preload()
                            ->searchable()
                            ->helperText('Kamu dapat menetapkan satu atau lebih peran'),
                    ])
                    ->columns(1)
                    ->collapsible(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Nama')->sortable()->searchable(),
                TextColumn::make('email')->label('Email')->sortable()->searchable(),
                TextColumn::make('roles.name')->label('Peran'),
            ])
            ->filters([
                TrashedFilter::make()->label('Tampilkan yang Dihapus'),
                SelectFilter::make('roles')
                    ->label('Filter berdasarkan Peran')
                    ->relationship('roles', 'name')
                    ->options(fn() => Role::pluck('name', 'id')->toArray())
                    ->multiple()
                    ->searchable(),
            ])
            ->actions([
                ActionGroup::make([
                    Action::make('resetToDefaultPassword')
                        ->label('Reset Password')
                        ->color('warning')
                        ->icon('heroicon-o-arrow-path')
                        ->action(function ($record) {
                            $record->update([
                                'password' => Hash::make('12345678') // Password default
                            ]);

                            Notification::make()
                                ->title('Password berhasil direset ke default')
                                ->body('Password untuk ' . $record->email . ' telah diubah menjadi default')
                                ->success()
                                ->send();
                        })
                        ->requiresConfirmation()
                        ->modalHeading('Reset Password ke Default')
                        ->modalDescription(function ($record) {
                            return 'Apakah Anda yakin mereset password ' . $record->email . ' menjadi default?';
                        })
                        ->modalButton('Ya, Reset Sekarang'),
                    ViewAction::make()
                        ->label('Lihat')
                        ->color('info')
                        ->icon('heroicon-o-eye'),
                    EditAction::make()
                        ->label('Ubah')
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/buat'),
            'edit' => Pages\EditUser::route('/{record}/ubah'),
        ];
    }
}
