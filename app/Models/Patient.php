<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
        'user_id',
        'assigned_doctor_id',
        'name',
        'gender',
        'age',
        'phone',
        'address',
        'token_number',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function assignedDoctor()
    {
        return $this->belongsTo(User::class, 'assigned_doctor_id');
    }

    public function treatments()
    {
        return $this->hasMany(Treatment::class);
    }

    public static function nextTokenNumber(): string
    {
        $lastPatient = self::whereNotNull('token_number')
            ->orderBy('id', 'desc')
            ->first();

        $nextNumber = 1;

        if ($lastPatient && $lastPatient->token_number) {
            $lastNumber = (int) preg_replace('/[^0-9]/', '', $lastPatient->token_number);
            $nextNumber = $lastNumber + 1;
        }

        return 'F' . str_pad((string) $nextNumber, 3, '0', STR_PAD_LEFT);
    }
}
