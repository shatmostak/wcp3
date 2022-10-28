<?php
namespace App\Imports;
use App\Models\VendorPricing;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;

class BavcoPricingImport implements ToModel, WithHeadingRow, WithCustomCsvSettings
{
    /**
    * @param array $row
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function getCsvSettings(): array
    {
        return [
            'delimiter' => "|"
        ];
    }
    public function model(array $row) {
        return new VendorPricing([
            'company' => 'bavco',
            'item_code' => $row['pn'],
            'item' => $row['description'],
            'item_cost' => floatval($row['price']),
            'quantity' => 1,
            'cost_type' => "EA",
            'unit_cost' => floatval($row['price']),
        ]);
    }

}
