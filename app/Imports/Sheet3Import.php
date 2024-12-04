<?php

namespace App\Imports;

use App\Models\Sheet3;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Carbon\Carbon;

class Sheet3Import implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $value = floatval($row['value']);
        $total2 = $this->calculateTotal2($value);

        return new Sheet3([
            'Contract' => $row['contract'],
            'PurchaseOrder' => $row['purchaseorder'],
            'Incoterm' => $row['incoterm'],
            'StartDelivery' => $this->transformDate($row['startdelivery']),
            'EndDelivery' => $this->transformDate($row['enddelivery']),
            'Commodity' => $row['commodity'],
            'QualityText' => $row['qualitytext'],
            'DasarTimbangan' => $row['dasar_timbangan'],
            'Quality' => $row['quality'],
            'LatePercentage' => $this->transformNumber($row['latepercentage']),
            'TotalReceive' => $this->transformNumber($row['total_receive']),
            'CountOutspec' => $this->transformNumber($row['countoutspec']),
            'CountTotal' => $this->transformNumber($row['counttotal']),
            'Certification' => $row['certification'],
            'QualityWeight' => $this->transformNumber($row['qualityweight']),
            'Deliverables' => $row['deliverables'],
            'CertificateWeight' => $this->transformNumber($row['certificateweight']),
            'NCCR' => $this->transformNumber($row['nccr']),
            'ContaminationWeight' => $this->transformNumber($row['contaminationweight']),
            'Susut' => $this->transformNumber($row['susut']),
            'Total' => $this->transformNumber($row['total']),
            'Value' => $row['value'],
            'Total2' => $total2,
            'Mill' => $row['mill']
        ]);
    }

    private function calculateTotal2($value)
    {
        if (is_string($value)) {
            return $value;
        }

        $value = floatval($value);
        if ($value >= 0.9) return 'A';
        if ($value >= 0.7) return 'B';
        if ($value >= 0.5) return 'C';
        if ($value >= 0.3) return 'D';
        return 'E';
    }

    private function transformNumber($value)
    {
        if (!is_numeric($value)) {
            return 0;
        }
        return $value;
    }

    private function transformDate($value)
    {
        try {
            if (empty($value)) return null;
            if ($value == 'StartDelivery') return null;

            return Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value));
        } catch (\Exception $e) {
            return null;
        }
    }
}
