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
        Schema::create('sheet2', function (Blueprint $table) {
            $table->id();
            $table->date('ReceivingDate');
            $table->string('DataNum');
            $table->string('LicensePlate');
            $table->string('Contract');
            $table->string('PurchaseOrder');
            $table->string('Supplier');
            $table->string('Mill');
            $table->integer('NettoKebun');
            $table->integer('NettoPabrik');
            $table->integer('NettoVar');
            $table->decimal('ActFFAMill', 8, 2);
            $table->decimal('ActImpMill', 8, 2);
            $table->decimal('ActMoistMill', 8, 2);
            $table->decimal('ActDOBIMill', 8, 2);
            $table->decimal('ActTVMMill', 8, 2);
            $table->string('Certification');
            $table->decimal('ActFFA', 8, 2);
            $table->decimal('ActMoist', 8, 2);
            $table->decimal('ActDOBI', 8, 2);
            $table->decimal('ActImp', 8, 2);
            $table->decimal('ActTVM', 8, 2);
            $table->decimal('ActBatu', 8, 2);
            $table->string('IncoTerm');
            $table->string('Commodity');
            $table->string('FFA');
            $table->string('Impurities');
            $table->string('Moist');
            $table->string('DOBI');
            $table->string('TVM');
            $table->string('Imp_TVM');
            $table->string('QualityOverall');
            $table->string('Deliverables');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_sheet2');
    }
};
