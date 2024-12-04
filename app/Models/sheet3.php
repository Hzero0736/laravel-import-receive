<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sheet3 extends Model
{
    use HasFactory;

    protected $table = 'sheet3';
    protected $primaryKey = 'id';
    protected $fillable = [
        'Contract',
        'PurchaseOrder',
        'Incoterm',
        'StartDelivery',
        'EndDelivery',
        'Commodity',
        'QualityText',
        'DasarTimbangan',
        'Quality',
        'LatePercentage',
        'TotalReceive',
        'CountOutspec',
        'CountTotal',
        'Certification',
        'QualityWeight',
        'Deliverables',
        'CertificateWeight',
        'NCCR',
        'ContaminationWeight',
        'Susut',
        'Total',
        'Value',
        'Total2',
        'Mill'
    ];

    public function sheet2()
    {
        return $this->belongsTo(sheet2::class, 'Contract', 'Contract');
    }
}
