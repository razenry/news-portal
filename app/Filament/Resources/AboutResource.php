<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AboutResource\Pages;
use App\Models\About;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class AboutResource extends Resource
{
    protected static ?string $model = About::class;

    protected static ?string $navigationIcon = 'heroicon-o-information-circle';
    protected static ?string $navigationLabel = 'Tentang Kami';
    protected static ?string $modelLabel = 'Tentang Kami';
    protected static ?string $navigationGroup = 'Manajemen Konten';
    protected static ?int $navigationSort = 1;

    protected static ?string $slug = 'tentang-kami';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Informasi Tentang Kami')
                    ->description('Isi informasi tentang perusahaan/organisasi Anda')
                    ->icon('heroicon-o-information-circle')
                    ->schema([
                        TextInput::make('title')
                            ->label('Judul')
                            ->required()
                            ->maxLength(50)
                            ->columnSpanFull(),
                            
                        Textarea::make('description')
                            ->label('Deskripsi')
                            ->required()
                            ->maxLength(500)
                            ->columnSpanFull()
                            ->rows(5)
                            ->extraInputAttributes(['style' => 'min-height: 120px']),
                    ])
                    ->columns(2)
                    ->collapsible(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('Judul')
                    ->description(fn (About $record) => Str::limit($record->description, 50))
                    ->wrap(),
                    
                TextColumn::make('updated_at')
                    ->label('Terakhir Diubah')
                    ->dateTime('d F Y H:i'),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->icon(icon: 'heroicon-o-pencil')
                    ->color('warning'),
            ])
            ->bulkActions([]) // Nonaktifkan bulk actions
            ->emptyStateActions([
                Tables\Actions\CreateAction::make()
                    ->label('Buat Tentang Kami')
                    ->hidden(fn() => About::count() > 0), // Sembunyikan jika sudah ada data
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAbouts::route('/'),
            'create' => Pages\CreateAbout::route('/create'),
            'edit' => Pages\EditAbout::route('/{record}/edit'),
        ];
    }
}