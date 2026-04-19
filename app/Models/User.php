<?php

namespace App\Models;

use BackedEnum;
use Illuminate\Support\Collection;
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
        $normalizedRoles = $this->normalizeRoles($roles);

        return in_array($userRole, $normalizedRoles, true);
    }

    public function hasAnyRole(...$roles): bool
    {
        return $this->hasRole($roles);
    }

    private function normalizeRoles($roles): array
    {
        if ($roles instanceof Collection) {
            $roles = $roles->all();
        }

        if ($roles instanceof BackedEnum) {
            $roles = $roles->value;
        }

        if (is_string($roles)) {
            $roles = explode('|', $roles);
        }

        if (!is_array($roles)) {
            $roles = [$roles];
        }

        $flatRoles = [];

        array_walk_recursive($roles, function ($role) use (&$flatRoles) {
            if ($role instanceof Collection) {
                foreach ($role->all() as $nestedRole) {
                    $this->normalizeRoleValue($nestedRole, $flatRoles);
                }

                return;
            }

            $this->normalizeRoleValue($role, $flatRoles);
        });

        return array_values(array_unique($flatRoles));
    }

    private function normalizeRoleValue($role, array &$flatRoles): void
    {
        if ($role instanceof BackedEnum) {
            $role = $role->value;
        }

        if (is_object($role) && isset($role->name)) {
            $role = $role->name;
        }

        if (!is_scalar($role)) {
            return;
        }

        foreach (explode('|', (string) $role) as $singleRole) {
            $singleRole = strtolower(trim($singleRole));

            if ($singleRole !== '') {
                $flatRoles[] = $singleRole;
            }
        }
    }
}
