<?php
namespace App\Imports;
use App\Models\VendorPricing;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithStartRow;

class FergusonPricingImport implements ToModel, WithStartRow, WithCustomCsvSettings
{

    /**
    * @param array $row
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    * @return \Illuminate\Database\Eloquent\Model|null
    */
        //options

   function startRow(): int
   {
       return 5;
   }
   function  getCsvSettings(): array {
       return [
           'delimiter' => ","
       ];
   }

    public function model(array $row) {
        return new VendorPricing([
            'company' => 'ferguson',
            'item_code' => $row[1],
            'item' => $row[4],
            'item_cost' => floatval(str_replace('$', '', $row[6])),
            'quantity' => 1,
            'cost_type' => "EA",
            'unit_cost' => floatval(str_replace('$', '', $row[6])),
        ]);
    }
}




