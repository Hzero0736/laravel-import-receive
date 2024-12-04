<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sheet2 extends Model
{
    use HasFactory;

    protected $table = 'sheet2';
    protected $primaryKey = 'id';
    protected $fillable = [
        'ReceivingDate',
        'DataNum',
        'LicensePlate',
        'Contract',
        'PurchaseOrder',
        'Supplier',
        'Mill',
        'NettoKebun',
        'NettoPabrik',
        'NettoVar',
        'ActFFAMill',
        'ActImpMill',
        'ActMoistMill',
        'ActDOBIMill',
        'ActTVMMill',
        'Certification',
        'ActFFA',
        'ActMoist',
        'ActDOBI',
        'ActImp',
        'ActTVM',
        'ActBatu',
        'IncoTerm',
        'Commodity',
        'FFA',
        'Impurities',
        'Moist',
        'DOBI',
        'TVM',
        'Imp_TVM',
        'QualityOverall',
        'Deliverables'
    ];

    public function sheet3()
    {
        return $this->hasMany(sheet3::class, 'Contract', 'Contract');
    }
}
