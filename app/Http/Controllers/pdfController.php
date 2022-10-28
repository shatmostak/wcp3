<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\VendorPricing;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\SkipsUnknownSheets;
use Maatwebsite\Excel\Concerns\WithStartRow;

use Maatwebsite\Excel\DefaultValueBinder;
use Throwable;

class pdfController extends Controller
{
    function read() {
        $parser = new \Smalot\PdfParser\Parser();
        $pdf = $parser->parseFile('C:\xampp\htdocs\LaravelExcelCsv-----\public\company_cost_files\Hughes.pdf');
        $text = $pdf->getText();
    }

}
