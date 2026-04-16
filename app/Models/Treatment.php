<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
    protected $fillable = [
        'patient_id',
        'drug_id',
        'dosage',
        'date',
        'notes',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function drug()
    {
        return $this->belongsTo(Drug::class);
    }
}