<?php
namespace App\Imports;
use App\Models\VendorPricing;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithStartRow;

class AmerexPricingImportTwo implements ToModel, SkipsEmptyRows, WithMultipleSheets, WithStartRow
{

    function startRow(): int
    {
        return 18;
    }

    public function sheets(): array
    {
        return [
            1 => $this,
        ];
    }
    /**
    * @param array $row
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    * @return \Illuminate\Database\Eloquent\Model|null
    */


    public function model(array $row) {

        if ($row[7]>1) {
            $entry = new VendorPricing([
                'company' => 'AMEREX',
                'item' => $row[4],
                'item_code' => $row[3],
                'item_code_2' => $row[5],
                'quantity' => $row[7],
                'item_cost' => floatval($row[8]),
                'cost_type' => "PER ".round($row[7]),
                'unit_cost' => floatval($row[8]/$row[7]),
            ]);
        } else {
            $entry = new VendorPricing([
                'company' => 'AMEREX',
                'item' => $row[4],
                'item_code' => $row[3],
                'item_code_2' => $row[5],
                'quantity' => 1,
                'item_cost' => floatval($row[8]),
                'cost_type' => "EA",
                'unit_cost' => floatval($row[8]),
            ]);
        }

        return $entry;
    }


    }
