<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\ProductEnquiry;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductEnquiryPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:ProductEnquiry');
    }

    public function view(AuthUser $authUser, ProductEnquiry $productEnquiry): bool
    {
        return $authUser->can('View:ProductEnquiry');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:ProductEnquiry');
    }

    public function update(AuthUser $authUser, ProductEnquiry $productEnquiry): bool
    {
        return $authUser->can('Update:ProductEnquiry');
    }

    public function delete(AuthUser $authUser, ProductEnquiry $productEnquiry): bool
    {
        return $authUser->can('Delete:ProductEnquiry');
    }

    public function restore(AuthUser $authUser, ProductEnquiry $productEnquiry): bool
    {
        return $authUser->can('Restore:ProductEnquiry');
    }

    public function forceDelete(AuthUser $authUser, ProductEnquiry $productEnquiry): bool
    {
        return $authUser->can('ForceDelete:ProductEnquiry');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:ProductEnquiry');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:ProductEnquiry');
    }

    public function replicate(AuthUser $authUser, ProductEnquiry $productEnquiry): bool
    {
        return $authUser->can('Replicate:ProductEnquiry');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:ProductEnquiry');
    }

}