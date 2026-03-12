<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientLabOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('patient_lab_orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id');
            $table->unsignedBigInteger('consultation_id')->nullable();
            $table->unsignedBigInteger('lab_test_catalog_id')->nullable();
            $table->string('order_number');
            $table->string('sample_type')->nullable();
            $table->string('priority')->default('routine');
            $table->string('status')->default('requested');
            $table->unsignedBigInteger('requested_by')->nullable();
            $table->timestamp('ordered_at')->nullable();
            $table->dateTime('scheduled_for')->nullable();
            $table->boolean('critical_alert')->default(false);
            $table->text('clinical_notes')->nullable();
            $table->text('result_summary')->nullable();
            $table->unsignedBigInteger('created_by');
            $table->timestamps();
            $table->index(['created_by', 'patient_id']);
            $table->index(['created_by', 'order_number']);
            $table->index(['created_by', 'status']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('patient_lab_orders');
    }
}
