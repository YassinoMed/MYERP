<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class PatientLabResult extends Model
{
    protected $fillable = [
        'patient_id',
        'consultation_id',
        'patient_lab_order_id',
        'patient_lab_sample_id',
        'test_name',
        'result_value',
        'unit',
        'reference_range',
        'status',
        'critical_flag',
        'analyzed_by',
        'validated_by',
        'validated_at',
        'result_date',
        'notes',
        'created_by',
    ];

    protected $casts = [
        'critical_flag' => 'boolean',
        'validated_at' => 'datetime',
        'result_date' => 'date',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function consultation()
    {
        return $this->belongsTo(PatientConsultation::class, 'consultation_id');
    }

    public function order()
    {
        return $this->belongsTo(PatientLabOrder::class, 'patient_lab_order_id');
    }

    public function sample()
    {
        return $this->belongsTo(PatientLabSample::class, 'patient_lab_sample_id');
    }

    public function validator()
    {
        return $this->belongsTo(User::class, 'validated_by');
    }
}
