<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientLabSamplesTable extends Migration
{
    public function up()
    {
        Schema::create('patient_lab_samples', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_lab_order_id');
            $table->string('sample_code');
            $table->string('sample_type')->nullable();
            $table->string('status')->default('pending');
            $table->timestamp('collected_at')->nullable();
            $table->unsignedBigInteger('collected_by')->nullable();
            $table->string('storage_location')->nullable();
            $table->text('notes')->nullable();
            $table->unsignedBigInteger('created_by');
            $table->timestamps();
            $table->index(['created_by', 'patient_lab_order_id']);
            $table->index(['created_by', 'sample_code']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('patient_lab_samples');
    }
}
