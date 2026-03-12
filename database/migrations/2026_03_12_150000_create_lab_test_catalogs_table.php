<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLabTestCatalogsTable extends Migration
{
    public function up()
    {
        Schema::create('lab_test_catalogs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code')->nullable();
            $table->string('sample_type')->nullable();
            $table->string('unit')->nullable();
            $table->string('reference_range')->nullable();
            $table->decimal('price', 15, 2)->default(0);
            $table->boolean('critical_supported')->default(false);
            $table->text('instructions')->nullable();
            $table->boolean('is_active')->default(true);
            $table->unsignedBigInteger('created_by');
            $table->timestamps();
            $table->index(['created_by', 'name']);
            $table->index(['created_by', 'code']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('lab_test_catalogs');
    }
}
