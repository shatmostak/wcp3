<?php

namespace App\Exports;

use App\Models\VendorPricing;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithLimit;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Facades\Excel;

class CostsExport implements FromCollection, WithCustomCsvSettings, WithHeadings, WithMapping {

    public function getCsvSettings(): array
    {
        return [
            'delimiter' => "\t"
        ];
    }

    public function headings(): array
    {

        return [
            "Item ID",
            "warehouse",
            "salesuom",
            "price",
            "costVendor",
            "costFreight",
            "costOverhead",
            "costLabor",
            "costBurden",
            "costContract",
            "costOther",
            "costeffdate",

        ];

    }

    public function properties(): array
    {
        return [
            'creator'        => 'matt shostak',
            'lastModifiedBy' => 'matt shostak',
            'title'          => 'Costs Export',
            'description'    => 'Costs Export',
            'subject'        => 'Costs',
            'keywords'       => 'costs,export,spreadsheet',
            'category'       => 'costs',
            'manager'        => 'Steve Bentz',
            'company'        => 'Metro',
        ];
    }
    public function collection()
    {
        // return DB::table('costs')->orderBy('created_at', 'DESC')->limit(100000)->get();
        $collection = DB::table('costs')->orderBy('created_at', 'DESC')->get();
        return $collection;
    }
    public function map($collection): array
    {
        $map = [
            $collection->item_code,
            "Gilbert",
            $collection->cost_type,
            $collection->item_cost,
            $collection->company,
            "",
            "",
            "",
            "",
            "",
            "",
            $collection->updated_at
        ];
        return $map;

    }
}

// $export = new CostsExport();
// Excel::download($export, 'costs.tsv');
