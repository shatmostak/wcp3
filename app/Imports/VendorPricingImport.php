<?php
namespace App\Imports;
use App\Models\VendorPricing;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class VendorPricingImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row) {
        return new VendorPricing([
          'company' => $row['company'],
          'item_code' => $row['item_code'],
          'item_code_2' => $row['item_code_2'],
          'manufacturer' => $row['manufacturer'],
          'item' => $row['item'],
          'cost'=> floatval($row['cost']),
          'extra_cost_1' => floatval($row['extra_cost_1']),
          'extra_cost_2' => floatval($row['extra_cost_2']),
          'extra_cost_3' => floatval($row['extra_cost_3'])
        ]);
    }
}
