<?php
namespace App\Imports;
use App\Models\VendorPricing;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class SiemensPricingImport implements ToModel, SkipsEmptyRows, WithMultipleSheets, withHeadingRow, WithCustomCsvSettings
{

        public function sheets(): array
        {
            return [
                1 => $this,
                2 => $this,
            ];
        }

        public function getCsvSettings(): array
        {
            return [
                'delimiter' => "\t"
            ];
        }

    /**
    * @param array $row
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function model(array $row) {
        if (floatval($row['trade_net']) != 0) {
            # code...
            return new VendorPricing([
                'company' => 'SIEMENS_INDUSTRY_DISTRIBUTOR',
                'item_code' => $row['model_number'],
                'item_code_2' => $row['part_number'],
                'item' => $row['description'],
                'item_cost' => floatval($row['trade_net']*.35),
                'quantity' => 1,
                'cost_type' => 'EA',
                'unit_cost' => floatval($row['trade_net']*.35),
            ]);

        }

        }


}
