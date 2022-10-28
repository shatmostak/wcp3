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

use Maatwebsite\Excel\DefaultValueBinder;
use Throwable;

class HughesPricingImport extends DefaultValueBinder implements ToModel, SkipsEmptyRows, WithMultipleSheets, SkipsUnknownSheets,
    withHeadingRow, WithCustomCsvSettings, WithStartRow, SkipsOnError
{
    /**
    * @param array $row
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    //import
    function model(array $row) {




        // if ($row['partnbr' && floatval($row['netprice']) > 0]) {
        //     return new VendorPricing([
        //         'company' => 'hughes',
        //         'item_code' => strval($row['partnbr']),
        //         'manufacturer' => '',
        //         'item' => $row['part_description'],
        //         'cost' => floatval( $row['netprice'])
        //     ]);
        // }
    }


    //options
    function sheets(): array
    {
        return [
            0 => $this,
        ];
    }
    function onUnknownSheet($sheetName)
    {
        // E.g. you can log that a sheet was not found.
        info("Sheet {$sheetName} was skipped");
    }
    function startRow(): int
    {
        return 9;
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
        return 7;
    }

}
