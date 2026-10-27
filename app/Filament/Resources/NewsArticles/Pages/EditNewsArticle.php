<?php

namespace App\Filament\Resources\NewsArticles\Pages;

use App\Filament\Resources\NewsArticles\NewsArticleResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\Action;
use Filament\Resources\Pages\EditRecord;

class EditNewsArticle extends EditRecord
{
    protected static string $resource = NewsArticleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('preview')
                ->label('Preview saved article')
                ->icon('heroicon-o-eye')
                ->visible(fn (): bool => auth()->user()->can('view', $this->getRecord()))
                ->url(fn (): string => route('news.preview', $this->getRecord()->slug))
                ->openUrlInNewTab(),
            DeleteAction::make(),
        ];
    }
}
