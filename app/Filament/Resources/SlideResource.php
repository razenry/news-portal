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

    protected static ?string $navigationGroup = 'Content Management';

    public static function getNavigationBadge(): ?string
    {
        $model = static::getModel();

        // Hitung jumlah unpublished
        if (!Auth::user()->hasRole(['super_admin', 'admin'], 'web')) {
            $unpublishedCount = $model::where('user_id', Auth::id())->withoutTrashed()->count();
        }

        $unpublishedCount = $model::where('published', '0')->withoutTrashed()->count();

        // Jika tidak ada unpublished, tampilkan jumlah published
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
            ? 'Unpublished'
            : 'Published';
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
                // SECTION: Meta Information
                Section::make('Slide Info')
                    ->description('Fill in the main details about the slide')
                    ->schema([
                        TextInput::make('title')
                            ->label('Title')
                            ->placeholder('Enter the title')
                            ->required()
                            ->columnSpanFull(),

                        Textarea::make('description')
                            ->label('Description')
                            ->placeholder('Enter a description')
                            ->rows(4)
                            ->helperText('Provide a detailed description')
                            ->columnSpanFull(),
                    ])
                    ->columns(1)
                    ->collapsible(),

                // SECTION: Media Upload
                Section::make('Image Upload')
                    ->description('Attach an image for this slide')
                    ->schema([
                        FileUpload::make('image')
                            ->label('Upload Image')
                            ->image()
                            ->maxSize(5120)
                            ->directory('uploads/slides')
                            ->imagePreviewHeight('150')
                            ->columnSpanFull(),
                    ])
                    ->columns(1)
                    ->collapsible(),

                // SECTION: Publish Control
                Section::make('Visibility')
                    ->schema([
                        Toggle::make('published')
                            ->label('Published')
                            ->default(true)
                            ->helperText('Mark as published if you want this to be visible'),
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
                        ->color('warning')
                        ->icon('heroicon-o-pencil'),
                    DeleteAction::make()
                        ->color('danger')
                        ->icon('heroicon-o-trash'),
                ]),
                RestoreAction::make()
                    ->color('success')
                    ->icon('heroicon-o-arrow-path'),
                ForceDeleteAction::make()
                    ->color('danger')
                    ->icon('heroicon-o-trash'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->color('danger')
                        ->icon('heroicon-o-trash'),
                    Tables\Actions\RestoreBulkAction::make()
                        ->color('success')
                        ->icon('heroicon-o-arrow-path'),
                    Tables\Actions\ForceDeleteBulkAction::make()
                        ->color('danger')
                        ->icon('heroicon-o-trash'),
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
