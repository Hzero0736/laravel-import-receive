<?php

namespace App\Imports;

use App\Models\Sheet2;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Carbon\Carbon;

class Sheet2Import implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Sheet2([
            'ReceivingDate' => $this->transformDate($row['receivingdate']),
            'DataNum' => $row['datanum'],
            'LicensePlate' => $row['licenseplate'],
            'Contract' => $row['contract'],
            'PurchaseOrder' => $row['purchaseorder'],
            'Supplier' => $row['supplier'],
            'Mill' => $row['mill'],
            'NettoKebun' => $row['nettokebun'],
            'NettoPabrik' => $row['nettopabrik'],
            'NettoVar' => $row['nettovar'],
            'ActFFAMill' => $row['actffamill'],
            'ActImpMill' => $row['actimpmill'],
            'ActMoistMill' => $row['actmoistmill'],
            'ActDOBIMill' => $row['actdobimill'],
            'ActTVMMill' => $row['acttvmmill'],
            'Certification' => $row['certification'],
            'ActFFA' => $row['actffa'],
            'ActMoist' => $row['actmoist'],
            'ActDOBI' => $row['actdobi'],
            'ActImp' => $row['actimp'],
            'ActTVM' => $row['acttvm'],
            'ActBatu' => $row['actbatu'],
            'IncoTerm' => $row['incoterm'],
            'Commodity' => $row['commodity'],
            'FFA' => $row['ffa'],
            'Impurities' => $row['impurities'],
            'Moist' => $row['moist'],
            'DOBI' => $row['dobi'],
            'TVM' => $row['tvm'],
            'Imp_TVM' => $row['imp_tvm'],
            'QualityOverall' => $row['qualityoverall'],
            'Deliverables' => $row['deliverables']
        ]);
    }

    private function transformDate($value)
    {
        try {
            if (empty($value)) return null;
            if ($value == 'ReceivingDate') return null;

            return Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value));
        } catch (\Exception $e) {
            return null;
        }
    }
}
