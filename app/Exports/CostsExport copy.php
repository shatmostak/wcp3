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
use Maatwebsite\Excel\Facades\Excel;

class CostsExport implements FromCollection, WithCustomCsvSettings, WithHeadings {

    public function getCsvSettings(): array
    {
        return [
            'delimiter' => "\t"
        ];
    }

    public function headings(): array
    {

        return [
            'id',
            'company',
            'item_code',
            'item_code_2',
            'manufacturer',
            'item',
            'cost',
            'extra_cost_1',
            'extra_cost_2',
            'extra_cost_3',
            'created_at',
            'updated_at'
        ];

    }
    public function collection()
    {
        // return DB::table('costs')->orderBy('created_at', 'DESC')->limit(100000)->get();

        return DB::table('costs')->orderBy('created_at', 'DESC')->get();
    }
}

$export = new CostsExport();
Excel::download($export, 'costs.tsv');
