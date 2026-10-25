<?php

namespace App\Filament\Resources\HomeBanners;

use App\Filament\Resources\HomeBanners\Pages\CreateHomeBanner;
use App\Filament\Resources\HomeBanners\Pages\EditHomeBanner;
use App\Filament\Resources\HomeBanners\Pages\ListHomeBanners;
use App\Models\Banner;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class HomeBannerResource extends Resource
{
    protected static ?string $model = Banner::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedPhoto;

    protected static ?string $modelLabel = 'home banner';

    protected static ?string $pluralModelLabel = 'home banners';

    protected static ?string $navigationLabel = 'Home Banners';

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('route_name', 'home');
    }

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            FileUpload::make('image')
                ->image()
                ->directory('banners')
                ->disk('public')
                ->visibility('public')
                ->openable()
                ->downloadable()
                ->required(),
            TextInput::make('sort_order')
                ->label('Sequence order')
                ->integer()
                ->minValue(1)
                ->default(fn () => ((int) Banner::where('route_name', 'home')->max('sort_order')) + 1)
                ->required()
                ->helperText('Lower numbers appear first. You can also drag banners into order in the list.'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('sort_order')
            ->reorderable('sort_order')
            ->reorderRecordsTriggerAction(fn (Action $action, bool $isReordering): Action => $action
                ->button()
                ->label($isReordering ? 'Done reordering' : 'Reorder banners')
                ->color('primary'))
            ->columns([
                TextColumn::make('sort_order')->label('Sequence order')->sortable(),
                ImageColumn::make('image')->disk('public')->visibility('public'),
            ])
            ->recordActions([EditAction::make()])
            ->toolbarActions([
                BulkActionGroup::make([DeleteBulkAction::make()]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListHomeBanners::route('/'),
            'create' => CreateHomeBanner::route('/create'),
            'edit' => EditHomeBanner::route('/{record}/edit'),
        ];
    }
}
