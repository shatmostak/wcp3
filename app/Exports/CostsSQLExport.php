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

class CostsSQLExport implements FromCollection, WithCustomCsvSettings, WithHeadings, WithMapping {

    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ","
        ];
    }

    public function headings(): array
    {
        return [
            'company',
            'item',
            'item_code',
            'item_code_2',
            'quantity',
            'item_cost',
            'cost_type',
            'unit_cost',
            'extra_cost_2',
            'extra_cost_3'
        ];
    }

    public function properties(): array
    {
        return [
            'creator'        => 'matt shostak',
            'lastModifiedBy' => 'matt shostak',
            'title'          => 'costs export',
            'description'    => 'costs export',
            'subject'        => 'costs',
            'keywords'       => 'costs,export,spreadsheet',
            'category'       => 'costs',
            'company'        => 'Metro',
        ];
    }
    public function collection()
    {
        $records = $_POST['records'];
        $collection = DB::table('costs')->orderBy('created_at', 'DESC')->get();
        if ($records) {
            $collection = DB::table('costs')->orderBy('created_at', 'DESC')->limit($records)->get();
        }
        return $collection;
    }

}