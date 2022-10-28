<?php
namespace App\Imports;
use App\Models\VendorPricing;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\SkipsUnknownSheets;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\DefaultValueBinder;
use Throwable;

class AzbatteryPricingImport extends DefaultValueBinder implements ToModel, SkipsEmptyRows, WithMultipleSheets,
    WithCustomCsvSettings, WithStartRow, SkipsOnError
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
            0 => $this,
        ];
    }
    function startRow(): int
    {
        return 1;
    }
    function getCsvSettings(): array {
        return [
            'delimiter' => "\t"
        ];
    }

    function onError(Throwable $e)
    {
    }


    //import
    function model(array $row) {
        dd("row " . $row );
        if ($row[0]) {
            return new VendorPricing([
                'company' => 'AZ_BATTERY_STORE',
                'item' => strval($row[0] . " " . $row[1]),
                'item_code' => strval($row[0] . " " . $row[1]),
                'item_cost' => floatval( $row[3])
            ]);
        }
    }


    //options


}
