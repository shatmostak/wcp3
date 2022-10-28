<?php
namespace App\Imports;
use App\Models\VendorPricing;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\SkipsUnknownSheets;
use Maatwebsite\Excel\Concerns\WithStartRow;


use Maatwebsite\Excel\Concerns\Error;
use Maatwebsite\Excel\DefaultValueBinder;
use Throwable;

class FarenhytSilverPricingImport extends DefaultValueBinder implements ToModel, SkipsEmptyRows, WithMultipleSheets,
    withHeadingRow, WithCustomCsvSettings, WithStartRow
{

    /**
    * @param array $row
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    function sheets(): array
    {
        return [
            1 => $this,
        ];
    }
    function startRow(): int
    {
        return 3;
    }
    function getCsvSettings(): array {
        return [
            'delimiter' => "\t"
        ];
    }

    function onError(Throwable $e)
    {
    }

    function headingRow(): int {
        return 2;
    }

    //import
    function model(array $row) {
        $honeywellinflationcharge = 1.0375;
        return new VendorPricing([
            'company' => 'SILENT_KNIGHT_FARENHYT',
            'item_code' => strval($row['part_number']),
            'item' => $row['description'],
            'item_cost' => floatval($row['silver_net']) * $honeywellinflationcharge,
            'cost_type' => "EA",
            'quantity' => 1,
            'unit_cost' => floatval($row['silver_net']) * $honeywellinflationcharge,
]);
    }


    //options

}
