<?php
namespace App\Imports;
use App\Models\VendorPricing;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\DefaultValueBinder;

class BreccoPricingImport extends DefaultValueBinder implements ToModel, SkipsEmptyRows, withHeadingRow, WithCustomCsvSettings, WithStartRow
{

    /**
    * @param array $row
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    //options
    // function sheets(): array
    // {
    //     dd($request);    
    //     $sheetarray = array_fill(0,40,$this);
    //     return $sheetarray;
    // }
    function startRow(): int
    {
        return 8;
    }
    function getCsvSettings(): array {
        return [
            'delimiter' => "\t"
        ];
    }

    function headingRow(): int {
        return 7;
    }

    //import
    function model(array $row) {
        if ($row['brecco_part']) {
            return new VendorPricing([
                'company' => 'BRECCO_(LONG_ISLAND_PIPE_SUPPLY)',
                'item_code' => strval($row['brecco_part']),
                'item' => $row['description'],
                'item_cost' => floatval($row['net']),
                'quantity' => 1,
                'cost_type' => "EA",
                'unit_cost' => floatval($row['net']),
            ]);
        }

    }


}
