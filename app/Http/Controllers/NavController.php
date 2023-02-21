<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use mysqli_result;


class NavController extends Controller
{

    public function priceTable()
    {
       return view('import.work-in-progress');
    }
    public function createQuote()
    {
       return view('import.work-in-progress');
    }
    public function exportHome()
    {
       return view('export.file-export');
    }
    public function importHome()
    {
       return view('import.file-import');
    }

    public function datatables() {
        $data = DB::table('costs')
         ->orderBy('created_at', 'DESC')
         ->where('item_cost','>',0)
         ->limit(500)
         ->get();
        return view('datatables')
            ->with('data', $data);
    }

}
