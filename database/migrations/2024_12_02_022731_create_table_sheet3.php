<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sheet3', function (Blueprint $table) {
            $table->id();
            $table->string('Contract');
            $table->string('PurchaseOrder');
            $table->string('Incoterm');
            $table->date('StartDelivery');
            $table->date('EndDelivery');
            $table->string('Commodity');
            $table->string('QualityText')->nullable();
            $table->string('DasarTimbangan')->nullable();
            $table->decimal('Quality', 10, 2)->nullable();
            $table->decimal('LatePercentage', 10, 2)->nullable();
            $table->integer('TotalReceive')->nullable();
            $table->integer('CountOutspec')->nullable();
            $table->integer('CountTotal')->nullable();
            $table->string('Certification')->nullable();
            $table->decimal('QualityWeight', 10, 2)->nullable();
            $table->string('Deliverables')->nullable();
            $table->decimal('CertificateWeight', 10, 2)->nullable();
            $table->decimal('NCCR', 10, 2)->nullable();
            $table->decimal('ContaminationWeight', 10, 2)->nullable();
            $table->decimal('Susut', 10, 2)->nullable();
            $table->decimal('Total', 10, 2)->nullable();
            $table->decimal('Value', 8, 2)->nullable();
            $table->string('Total2');
            $table->string('Mill')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_sheet3');
    }
};
