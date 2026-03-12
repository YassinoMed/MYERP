<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PatientLabSample extends Model
{
    protected $fillable = [
        'patient_lab_order_id',
        'sample_code',
        'sample_type',
        'status',
        'collected_at',
        'collected_by',
        'storage_location',
        'notes',
        'created_by',
    ];

    protected $casts = [
        'collected_at' => 'datetime',
    ];

    public function order()
    {
        return $this->belongsTo(PatientLabOrder::class, 'patient_lab_order_id');
    }

    public function collector()
    {
        return $this->belongsTo(User::class, 'collected_by');
    }
}
