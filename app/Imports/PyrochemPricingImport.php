<?php
namespace App\Imports;
use App\Models\VendorPricing;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\SkipsUnknownSheets;
use Maatwebsite\Excel\Concerns\WithStartRow;

use Maatwebsite\Excel\DefaultValueBinder;
use Throwable;

class PyrochemPricingImport extends DefaultValueBinder implements ToModel, WithMultipleSheets, WithCustomCsvSettings,
    withHeadingRow, WithStartRow
{


    //options
    function sheets(): array
    {
        return [
            0 => $this,
        ];
    }
    function getCsvSettings(): array {
        return [
            'delimiter' => "\t"
        ];
    }

    function startRow(): int
    {
        return 9;
    }

    function headingRow(): int {
        return 7;
    }


    /**
    * @param array $row
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    * @return \Illuminate\Database\Eloquent\Model|null
    */


    //import
    function model(array $row) {
            return new VendorPricing([
                'company' => 'TYCO_PYRO_CHEM_DIVISION',
                'item_code' => strval($row['partnbr']),
                'item' => $row['part_description'],
                'item_cost' => floatval( $row['netprice']),
                'quantity' => 1,
                'cost_type' => "EA",
                'unit_cost' => floatval( $row['netprice']),
            ]);
        }


}
