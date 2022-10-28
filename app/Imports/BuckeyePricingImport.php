<?php
namespace App\Imports;
use App\Models\VendorPricing;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\SkipsUnknownSheets;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use Maatwebsite\Excel\Concerns\WithStartRow;


class BuckeyePricingImport implements ToModel, SkipsEmptyRows, WithMultipleSheets,
    withHeadingRow, WithCustomCsvSettings, WithStartRow, WithCalculatedFormulas
{

    /**
    * @param array $row
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    //options
    function sheets(): array
    {
        return [
            0 => $this,
        ];
    }
    function startRow(): int
    {
        return 4;
    }
    function getCsvSettings(): array {
        return [
            'delimiter' => "\t"
        ];
    }

    function headingRow(): int {
        return 2;
    }

    //import
    function model(array $row) {
        if ($row['dealer_net_price']) {
            return new VendorPricing([
                'company' => 'BUCKEYE_FIRE_EQUIPMENT',
                'item_code' => strval($row['model_number']),
                'item' => $row['description'],
                'item_cost' => floatval($row['dealer_net_price']),
                'quantity' => 1,
                'cost_type' => "EA",
                'unit_cost' => floatval($row['dealer_net_price']),
            ]);
        }
    }



}
