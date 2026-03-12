<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LabTestCatalog extends Model
{
    protected $fillable = [
        'name',
        'code',
        'sample_type',
        'unit',
        'reference_range',
        'price',
        'critical_supported',
        'instructions',
        'is_active',
        'created_by',
    ];

    protected $casts = [
        'critical_supported' => 'boolean',
        'is_active' => 'boolean',
        'price' => 'float',
    ];

    public function labOrders()
    {
        return $this->hasMany(PatientLabOrder::class);
    }
}
