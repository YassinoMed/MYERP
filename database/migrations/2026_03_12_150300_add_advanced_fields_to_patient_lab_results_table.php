<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAdvancedFieldsToPatientLabResultsTable extends Migration
{
    public function up()
    {
        Schema::table('patient_lab_results', function (Blueprint $table) {
            if (!Schema::hasColumn('patient_lab_results', 'patient_lab_order_id')) {
                $table->unsignedBigInteger('patient_lab_order_id')->nullable()->after('consultation_id');
            }
            if (!Schema::hasColumn('patient_lab_results', 'patient_lab_sample_id')) {
                $table->unsignedBigInteger('patient_lab_sample_id')->nullable()->after('patient_lab_order_id');
            }
            if (!Schema::hasColumn('patient_lab_results', 'status')) {
                $table->string('status')->default('draft')->after('reference_range');
            }
            if (!Schema::hasColumn('patient_lab_results', 'critical_flag')) {
                $table->boolean('critical_flag')->default(false)->after('status');
            }
            if (!Schema::hasColumn('patient_lab_results', 'analyzed_by')) {
                $table->unsignedBigInteger('analyzed_by')->nullable()->after('critical_flag');
            }
            if (!Schema::hasColumn('patient_lab_results', 'validated_by')) {
                $table->unsignedBigInteger('validated_by')->nullable()->after('analyzed_by');
            }
            if (!Schema::hasColumn('patient_lab_results', 'validated_at')) {
                $table->timestamp('validated_at')->nullable()->after('validated_by');
            }
            $table->index(['created_by', 'patient_lab_order_id'], 'plr_created_order_idx');
            $table->index(['created_by', 'status'], 'plr_created_status_idx');
        });
    }

    public function down()
    {
        Schema::table('patient_lab_results', function (Blueprint $table) {
            foreach ([
                'plr_created_order_idx',
                'plr_created_status_idx',
            ] as $index) {
                try {
                    $table->dropIndex($index);
                } catch (\Throwable $e) {
                }
            }

            foreach ([
                'validated_at',
                'validated_by',
                'analyzed_by',
                'critical_flag',
                'status',
                'patient_lab_sample_id',
                'patient_lab_order_id',
            ] as $column) {
                if (Schema::hasColumn('patient_lab_results', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
}
