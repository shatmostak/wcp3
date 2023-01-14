<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\BavcoPricingImport;
use App\Imports\FergusonPricingImport;
use App\Imports\SiemensPricingImport;
use App\Imports\AmerexPricingImport;
use App\Imports\BadgerPricingImport;
use App\Imports\BuckeyePricingImport;
use Illuminate\Support\Facades\DB;
use App\Imports\FarenhytGoldPricingImport;
use App\Imports\RangeguardPricingImport;
use App\Imports\AzbatteryPricingImport;
use App\Imports\BreccoPricingImport;
use App\Imports\GamewellGoldPricingImport;
use App\Imports\PyrochemPricingImport;
use App\Imports\HughesPricingImport;
use App\Imports\GamewellSilverPricingImport;
use App\Imports\FarenhytSilverPricingImport;
use App\Imports\AmerexPricingImportTwo;
use App\Models\VendorPricing;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;


class ImportController extends Controller
{
    public $company;
    public $nocompany;

    public function upload(Request $request) {
        $file = $request->file('uploadFile');
        $nocompany = null;
        // if no file is selected stays on homepage
        if(!$file) {
            $nocompany = true;
            return redirect()->route('importhome');
        }
        //saves upload locally
        // $basepath = $request::base();
        $filename = $file->getClientOriginalName();
        $tempdir = dirname(__DIR__,3) . '/storage/temp';
        // if file is selected - will match company to pre-configured company switch - to determine company
        $importarray = Excel::ToArray(new VendorPricing, $request->file('uploadFile'), 's3', \Maatwebsite\Excel\Excel::XLSX);
        dd($importarray);
        $firstrow = $importarray[0][0];
        dd($firstrow);
        $move = $file->move($tempdir, $filename);
        // figuring out which company based on sheet1 and sheet2 data
        switch (true) {
            case $firstrow[1] == "BAT":
                $company = "AZ BATTERY";
                break;
            case $firstrow[1] == "Amerex Corporation":
                $company = "Amerex Corporation";
                break;
            case $firstrow[9] == "EBA":
                $company = "Badger";
                break;
            case $importarray[0][6][3] == "Brecco Part":
                $company = "Brecco";
                break;
            case $firstrow[4] > 0 && $firstrow[6] > 0:
                $company = "Buckeye";
                break;
            case strpos($importarray[1][0][3], "Farenhyt") == 0:
                $company = "Farenhyt";
                break;
            case strpos($importarray[1][0][2], "PRICE LIST") > 0:
                $company = "Gamewell";
                break;
            case $firstrow[0] == "SEARCH" && $firstrow[1] == "MFR":
                $company = "BAVCO";
                break;
            case $importarray[0][6][0] == "PriceList" && $importarray[0][6][2] == "PartNbr":
                $company = "Pyrochem";
                break;
            case $firstrow[0] == "Range Guard® Wet Chemical Systems":
                $company = "Range Guard";
                break;
            case $firstrow[0] == "SIEMENS":
                $company = "SIEMENS";
                break;
            default:
                $company = null;
                return redirect()->route('importhome');
                break;
        }

        // setting up company verification
        $nocompany = false;
        $filepath = $tempdir . $filename;
        dd($filepath);
        // sending to company verification page
        Cache::put('company', $company);
        Cache::put('nocompany', $nocompany);
        Cache::put('file', $filepath);
        return view('import.confirm-company', compact(['company', 'nocompany']));

    }

    public function confirmCompany(Request $request)
    {

        $company = Cache::get('company');
        $nocompany = Cache::get('nocompany');
        $importfile = Cache::get('file', $tempdir . $filename);
        dd($importfile);
        $req = $request->all();
        if (array_key_exists('cancel', $req)) {
            $company = null;
            $nocompany = true;
            return view('import.confirm-company', compact(['company', 'nocompany']));
        } 
        $thefile = Storage::get('upload');
        dd(Storage::disk('local')->get('upload'));

            dd($thefile);
            switch ($company) {
                case 'AZ BATTERY':
                    try
                    {
                        $data = Excel::import(new AzbatteryPricingImport, $filefile);
                        dd('made it this far');

                        dd($data);
                    }
                    catch (\Throwable $th)

                    {
                        $data = $th;
                        $dataerror = $th;
                    }
                    break;

                case 'bavco':
                    try
                    {
                        $data = Excel::import(new BavcoPricingImport, $importarray);
                    }
                    catch (\Throwable $th)
                    {
                        $dataerror = $th;
                    }
                    break;
                case 'siemens':
                    try
                    {
                        $data = Excel::import(new SiemensPricingImport, $importarray);
                    }
                    catch (\Throwable $th)
                    {
                        $dataerror = $th;
                    }
                    break;
                case 'amerex':
                    try
                    {
                        $data = Excel::import(new AmerexPricingImport, $importarray);
                        $data2 = Excel::import(new AmerexPricingImportTwo, $importarray);
                    }
                    catch (\Throwable $th)
                    {
                        $dataerror = $th;
                    }
                    break;
                case 'badger':
                    try
                    {
                        $data = Excel::import(new BadgerPricingImport, $importarray);
                    }
                    catch (\Throwable $th)
                    {
                        $dataerror = $th;
                    }
                    break;

                case 'buckeye':
                    try
                    {
                        $data = Excel::import(new BuckeyePricingImport, $importarray);
                    }
                    catch (\Throwable $th)
                    {
                        $dataerror = $th;
                    }
                    break;
                case 'farenhyt-silver':
                    try
                    {
                        $data = Excel::import(new FarenhytSilverPricingImport, $importarray);
                    }
                    catch (\Throwable $th)
                    {
                        $dataerror = $th;
                    }
                    break;
                case 'gamewell-silver':
                    try
                    {
                        $data = Excel::import(new GamewellSilverPricingImport, $importarray);
                    }
                    catch (\Throwable $th)
                    {
                        $dataerror = $th;
                    }
                    break;
                case 'rangeguard':
                    try
                    {
                        $data = Excel::import(new RangeguardPricingImport, $importarray);
                    }
                    catch (\Throwable $th)
                    {
                        $dataerror = $th;
                    }
                    break;

                case 'brecco':
                    try
                    {
                        $data = Excel::import(new BreccoPricingImport, $importarray);
                    }
                    catch (\Throwable $th)
                    {
                        $dataerror = $th;
                    }
                    break;
                case 'pyrochem':
                    try
                    {
                        $data = Excel::import(new PyrochemPricingImport, $importarray);
                    }
                    catch (\Throwable $th)
                    {
                        $dataerror = $th;
                    }
                    break;

                case 'hughes':
                    try
                    {
                        $data = Excel::import(new HughesPricingImport, $importarray);
                    }
                    catch (\Throwable $th)
                    {
                        $dataerror = $th;
                    }
                    break;
                case 'farenhyt-gold':
                    try
                    {
                        $data = Excel::import(new FarenhytGoldPricingImport, $importarray);
                    }
                    catch (\Throwable $th)
                    {
                        $dataerror = $th;
                    }
                    break;
                case 'ferguson':
                    try
                    {
                        $data = Excel::import(new FergusonPricingImport, $importarray);
                    }        
                    catch (\Throwable $th)
                    {
                        $dataerror = $th;
                    }
                    break;
                case 'gamewell-gold':
                    try
                    {
                        $data = Excel::import(new GamewellGoldPricingImport, $importarray);
                    }
                    catch (\Throwable $th)
                    {
                        $dataerror = $th;
                    }
                    break;
                case null:
                    break;
            }

                // $dbview = DB::table('costs')->orderBy('created_at', 'DESC')->limit(50)->get();
                $datastatus = "import - upload to database was successful!";
                // 
                $dbview = [];
                // return view('import.import-results', compact(['datastatus', 'dbview']));
                return view('import.import-results', compact(['datastatus', 'dbview', 'company']));




            // try
            // {
            //     // $dbview = DB::table('costs')->orderBy('created_at', 'DESC')->limit(50)->get();
            //     $datastatus = " import - upload to database was successful!";
            //     // 
            //     // return view('import.import-results', compact(['datastatus', 'dbview']));
            //     return view('import.import-results', compact(['datastatus', 'company']));

            // }
            // catch (\Throwable $th)
            // {
            //     $datastatus = $company . "import - failed";
            //     return view('import.import-results', compact(['datastatus']));

            // }
    }


    public function recentDbUpdates() {
        $data = DB::table('costs')->orderBy('created_at', 'DESC')->limit(50)->get();
        return view('import.recent-db', compact('data'));
    }
}
