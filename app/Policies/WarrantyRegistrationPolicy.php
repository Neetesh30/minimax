<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\WarrantyRegistration;
use Illuminate\Auth\Access\HandlesAuthorization;

class WarrantyRegistrationPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:WarrantyRegistration');
    }

    public function view(AuthUser $authUser, WarrantyRegistration $warrantyRegistration): bool
    {
        return $authUser->can('View:WarrantyRegistration');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:WarrantyRegistration');
    }

    public function update(AuthUser $authUser, WarrantyRegistration $warrantyRegistration): bool
    {
        return $authUser->can('Update:WarrantyRegistration');
    }

    public function delete(AuthUser $authUser, WarrantyRegistration $warrantyRegistration): bool
    {
        return $authUser->can('Delete:WarrantyRegistration');
    }

    public function restore(AuthUser $authUser, WarrantyRegistration $warrantyRegistration): bool
    {
        return $authUser->can('Restore:WarrantyRegistration');
    }

    public function forceDelete(AuthUser $authUser, WarrantyRegistration $warrantyRegistration): bool
    {
        return $authUser->can('ForceDelete:WarrantyRegistration');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:WarrantyRegistration');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:WarrantyRegistration');
    }

    public function replicate(AuthUser $authUser, WarrantyRegistration $warrantyRegistration): bool
    {
        return $authUser->can('Replicate:WarrantyRegistration');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:WarrantyRegistration');
    }

}