<?php
namespace App\Imports;
use App\Models\VendorPricing;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\SkipsUnknownSheets;
use Maatwebsite\Excel\Concerns\WithStartRow;

class BadgerPricingImport implements ToModel, SkipsEmptyRows, WithMultipleSheets,
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
            0 => $this,
        ];
    }
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
        return 5;
    }
    function model(array $row) {
        if ($row['description']) {

            if (floatval($row['skid_quantity'])>1) {
                return new VendorPricing([
                    'company' => 'badger',
                    'item_code' => strval($row['part']),
                    'item_code_2' => $row['model'],
                    'item' => $row['description'],
                    'quantity' => floatval($row['skid_quantity']),
                    'item_cost' => floatval($row['eba']),
                    'cost_type' => "PER " . $row['skid_quantity'],
                    'unit_cost' => floatval($row['eba'])/floatval($row['skid_quantity']),

                ]);
            } else {
                return new VendorPricing([
                    'company' => 'BADGER_DAYLIGHTING_CORP',
                    'item_code' => strval($row['part']),
                    'item_code_2' => $row['model'],
                    'item' => $row['description'],
                    'quantity' => 1,
                    'item_cost' => floatval($row['eba']),
                    'cost_type' => "EA",
                    'unit_cost' => floatval($row['eba']),

                ]);
            }
        }
    }
}




