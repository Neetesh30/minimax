<?php

namespace App\Filament\Resources\NewsArticles\Tables;

use App\Models\NewsArticle;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\Action;
use Filament\Actions\ReplicateAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class NewsArticlesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('cover_image')
                    ->label('Cover')
                    ->disk('public'),

                TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->limit(50),

                TextColumn::make('article_category')
                    ->label('Category')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('author')
                    ->searchable()
                    ->toggleable(),

                TextColumn::make('status')
                    ->badge()
                    ->formatStateUsing(
                        fn (string $state): string => ucfirst($state)
                    )
                    ->color(fn (string $state): string => match ($state) {
                        'published' => 'success',
                        default => 'gray',
                    })
                    ->sortable(),

                TextColumn::make('published_at')
                    ->label('Publication date')
                    ->dateTime('d M Y, H:i')
                    ->placeholder('Not set')
                    ->sortable(),

                TextColumn::make('updated_at')
                    ->label('Last updated')
                    ->dateTime('d M Y, H:i')
                    ->sortable(),

                TextColumn::make('slug')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('created_at')
                    ->dateTime('d M Y, H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('updated_at', 'desc')
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'draft' => 'Draft',
                        'published' => 'Published',
                    ]),
            ])
            ->recordActions([
                EditAction::make(),
                Action::make('preview')
                    ->label('Preview')
                    ->icon('heroicon-o-eye')
                    ->authorize(fn (NewsArticle $record): bool => Gate::allows('view', $record))
                    ->url(fn (NewsArticle $record): string => route('news.preview', $record->slug))
                    ->openUrlInNewTab(),
                ReplicateAction::make()
                    ->label('Duplicate as draft')
                    ->modalHeading('Duplicate article as draft')
                    ->modalDescription('Copy this article into a new draft. The original article will remain unchanged.')
                    ->modalSubmitActionLabel('Create draft copy')
                    ->authorize(fn (NewsArticle $record): bool => Gate::allows('replicate', $record)
                        && Gate::allows('create', NewsArticle::class))
                    ->beforeReplicaSaved(function (NewsArticle $replica): void {
                        $replica->title = Str::limit($replica->title, 248, '').' (Copy)';
                        $replica->slug = Str::limit($replica->slug, 213, '').'-copy-'.Str::uuid();
                        $replica->status = 'draft';
                        $replica->published_at = null;
                    })
                    ->successNotificationTitle('Article duplicated as draft'),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
