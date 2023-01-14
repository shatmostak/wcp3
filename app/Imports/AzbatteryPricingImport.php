<?php
namespace App\Imports;
use App\Models\VendorPricing;
use Maatwebsite\Excel\Concerns\ToModel;

class AzbatteryPricingImport implements ToModel
{

    /**
    * @param array $row
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    //import
    public function model(array $row) {
            return new VendorPricing([
                'company' => 'AZ_BATTERY_STORE',
                'item' => strval($row[0] . " " . $row[1]),
                'item_code' => strval($row[0] . " " . $row[1]),
                'item_cost' => floatval( $row[3])
            ]);
        }


    //options


}
