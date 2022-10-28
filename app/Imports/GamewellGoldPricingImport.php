<?php
namespace App\Imports;
use App\Models\VendorPricing;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithStartRow;

use Maatwebsite\Excel\DefaultValueBinder;
use Throwable;

class GamewellGoldPricingImport extends DefaultValueBinder implements ToModel, SkipsEmptyRows, WithMultipleSheets,
    withHeadingRow, WithStartRow
    {

    /**
    * @param array $row
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    function startRow(): int
    {
        return 3;
    }

    function headingRow(): int {
        return 2;
    }
    function sheets(): array
    {
        return [
            1 => $this,
        ];
    }
    //import
    function model(array $row) {
        $honeywellinflationcharge = 1.0375;
            return new VendorPricing([
                'company' => 'gamewell',
                'item_code' => strval($row['part_no']),
                'item' => $row['description'],
                'item_cost' => floatval($row['platinumgold_net']) * $honeywellinflationcharge,
                'quantity' => 1,
                'cost_type' => "EA",
                'unit_cost' => floatval($row['platinumgold_net']) * $honeywellinflationcharge,
            ]);

    }
}
