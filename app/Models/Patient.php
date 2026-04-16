<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
        'user_id',
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

    public function treatments()
    {
        return $this->hasMany(Treatment::class);
    }
}