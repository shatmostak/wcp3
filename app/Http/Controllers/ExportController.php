<?php

namespace App\Http\Controllers;

use App\Exports\CostsExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;


class ExportController extends Controller
{
    /**
    * @return \Illuminate\Support\Collection
    */
    function fileExport() {
        return new CostsExport;
    }
}
