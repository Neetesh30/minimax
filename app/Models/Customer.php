<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Database\Eloquent\Model;
use Filament\Panel;

class Customer extends Authenticatable implements FilamentUser
{

    use Notifiable;
    protected $fillable = [
    'name',
    'email',
    'phone',
     'pincode',
    'customer_account',
    'password',
    'is_approved',
];

    public function canAccessPanel(Panel $panel): bool
    {
        return $panel->getId() === 'customer';
    }
}