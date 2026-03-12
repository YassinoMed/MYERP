<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PatientLabOrder extends Model
{
    protected $fillable = [
        'patient_id',
        'consultation_id',
        'lab_test_catalog_id',
        'order_number',
        'sample_type',
        'priority',
        'status',
        'requested_by',
        'ordered_at',
        'scheduled_for',
        'critical_alert',
        'clinical_notes',
        'result_summary',
        'created_by',
    ];

    protected $casts = [
        'ordered_at' => 'datetime',
        'scheduled_for' => 'datetime',
        'critical_alert' => 'boolean',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function consultation()
    {
        return $this->belongsTo(PatientConsultation::class, 'consultation_id');
    }

    public function labTest()
    {
        return $this->belongsTo(LabTestCatalog::class, 'lab_test_catalog_id');
    }

    public function requester()
    {
        return $this->belongsTo(User::class, 'requested_by');
    }

    public function sample()
    {
        return $this->hasOne(PatientLabSample::class, 'patient_lab_order_id');
    }

    public function result()
    {
        return $this->hasOne(PatientLabResult::class, 'patient_lab_order_id');
    }
}
