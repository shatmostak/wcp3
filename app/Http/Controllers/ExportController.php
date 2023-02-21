<?php

namespace App\Http\Controllers;

use App\Exports\CostsExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CostsSQLExport;


class ExportController extends Controller
{
    /**
    * @return \Illuminate\Support\Collection
    */
    
    public function exportPull() {
        $export = Excel::download(new CostsExport, 'costsimport.tsv');
        if ($_POST['format']=='sql') {
            $export = Excel::download(new CostsSQLExport, 'costssql.csv');
        };
        return $export;
    }


}