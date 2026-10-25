<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\ResourcePdf;
use Illuminate\Auth\Access\HandlesAuthorization;

class ResourcePdfPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:ResourcePdf');
    }

    public function view(AuthUser $authUser, ResourcePdf $resourcePdf): bool
    {
        return $authUser->can('View:ResourcePdf');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:ResourcePdf');
    }

    public function update(AuthUser $authUser, ResourcePdf $resourcePdf): bool
    {
        return $authUser->can('Update:ResourcePdf');
    }

    public function delete(AuthUser $authUser, ResourcePdf $resourcePdf): bool
    {
        return $authUser->can('Delete:ResourcePdf');
    }

    public function restore(AuthUser $authUser, ResourcePdf $resourcePdf): bool
    {
        return $authUser->can('Restore:ResourcePdf');
    }

    public function forceDelete(AuthUser $authUser, ResourcePdf $resourcePdf): bool
    {
        return $authUser->can('ForceDelete:ResourcePdf');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:ResourcePdf');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:ResourcePdf');
    }

    public function replicate(AuthUser $authUser, ResourcePdf $resourcePdf): bool
    {
        return $authUser->can('Replicate:ResourcePdf');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:ResourcePdf');
    }

}