<?php
namespace App\Imports;
use App\Models\VendorPricing;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\DefaultValueBinder;

class RangeguardPricingImport extends DefaultValueBinder implements ToModel, SkipsEmptyRows,
    withHeadingRow, WithStartRow
{

    //options
    function sheets(): array
    {
        return [
            0 => $this,
        ];
    }
    function startRow(): int
    {
        return 12;
    }

    function headingRow(): int {
        return 9;
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
                'company' => 'range guard',
                'item_code' => strval($row['part_number']),
                'item' => $row['description'],
                'item_cost' => floatval( $row['suggested_retail_price_us']) * .4, // "discount" of 40%, change this .4 to 1/100 of "discount" (was cell e6)
                'quantity' => 1,
                'cost_type' => "EA",
                'unit_cost' => floatval( $row['suggested_retail_price_us']) * .4,
            ]);
    }


}
