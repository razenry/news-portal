<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SlideResource\Pages;
use App\Filament\Resources\SlideResource\RelationManagers;
use App\Models\Slide;
use Filament\Forms\Components\FileUpload;
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
use Illuminate\Support\Str;

class SlideResource extends Resource
{
    protected static ?string $model = Slide::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';

    protected static ?string $navigationGroup = 'Content Management';

    public static function getNavigationBadge(): ?string
    {
        $model = static::getModel();

        // Hitung jumlah unpublished
        $unpublishedCount = $model::where('published', '0')->count();

        // Jika tidak ada unpublished, tampilkan jumlah published
        return $unpublishedCount > 0
            ? $unpublishedCount
            : $model::where('published', '1')->count();
    }

    public static function getNavigationBadgeTooltip(): ?string
    {
        $model = static::getModel();
        $unpublishedCount = $model::where('published', '0')->count();

        return $unpublishedCount > 0
            ? 'Unpublished'
            : 'Published';
    }

    public static function getNavigationBadgeColor(): ?string
    {
        $model = static::getModel();
        $unpublishedCount = $model::where('published', '0')->count();

        return $unpublishedCount > 0 ? 'warning' : 'success';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')->live(onBlur: true)
                    ->afterStateUpdated(function (callable $set, callable $get, $state) {
                        $slug = Str::slug($state);
                        $originalSlug = $slug;
                        $count = 1;

                        $slideId = $get('id');

                        while (Slide::where('slug', $slug)->where('id', '!=', $slideId)->exists()) {
                            $slug = "{$originalSlug}-{$count}";
                            $count++;
                        }

                        $set('slug', $slug);
                    }),
                TextInput::make('slug')->required()
                    ->unique(Slide::class, 'slug', ignoreRecord: true)
                    ->readOnly(),

                Textarea::make('description'),
                FileUpload::make('image'),
                Toggle::make('published')
                    ->label('Published')
                    ->default(1)
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')->toggleable(),
                TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                ToggleColumn::make('published')
                    ->label('Published')
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('created_at')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
            ])
            ->filters([
                TrashedFilter::make(),
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
            ])->modifyQueryUsing(function (Builder $query) {
                $query->orderBy('created_at', 'desc')
                    ->withoutGlobalScopes([SoftDeletingScope::class]);
            });
        ;
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
            'create' => Pages\CreateSlide::route('/create'),
            'edit' => Pages\EditSlide::route('/{record}/edit'),
        ];
    }
}
