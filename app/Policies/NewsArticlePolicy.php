<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\NewsArticle;
use Illuminate\Auth\Access\HandlesAuthorization;

class NewsArticlePolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:NewsArticle');
    }

    public function view(AuthUser $authUser, NewsArticle $newsArticle): bool
    {
        return $authUser->can('View:NewsArticle');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:NewsArticle');
    }

    public function update(AuthUser $authUser, NewsArticle $newsArticle): bool
    {
        return $authUser->can('Update:NewsArticle');
    }

    public function delete(AuthUser $authUser, NewsArticle $newsArticle): bool
    {
        return $authUser->can('Delete:NewsArticle');
    }

    public function restore(AuthUser $authUser, NewsArticle $newsArticle): bool
    {
        return $authUser->can('Restore:NewsArticle');
    }

    public function forceDelete(AuthUser $authUser, NewsArticle $newsArticle): bool
    {
        return $authUser->can('ForceDelete:NewsArticle');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:NewsArticle');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:NewsArticle');
    }

    public function replicate(AuthUser $authUser, NewsArticle $newsArticle): bool
    {
        return $authUser->can('Replicate:NewsArticle');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:NewsArticle');
    }

}