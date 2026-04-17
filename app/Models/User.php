<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'email_otp',
        'otp_expires_at',
        'email_verified_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'email_otp',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'otp_expires_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function hasRole($roles): bool
    {
        $userRole = strtolower((string) $this->role);

        if (is_string($roles)) {
            $roles = explode('|', $roles);
        }

        if (!is_array($roles)) {
            return $userRole === strtolower((string) $roles);
        }

        $flatRoles = [];

        array_walk_recursive($roles, function ($role) use (&$flatRoles) {
            if (is_string($role)) {
                foreach (explode('|', $role) as $singleRole) {
                    $singleRole = trim($singleRole);

                    if ($singleRole !== '') {
                        $flatRoles[] = strtolower($singleRole);
                    }
                }
            }
        });

        return in_array($userRole, $flatRoles, true);
    }
}