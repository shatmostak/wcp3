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
use DataTables;
use App\Post;



class ImportController extends Controller
{

    public function upload(Request $request) {
        $file = $request->file('file');
        $company = null;
        if ($file) {
            //validation//
            $filepath = $_FILES['file']['tmp_name'];
            $fileSize = filesize($filepath);
            $fileinfo = finfo_open(FILEINFO_MIME_TYPE);
            $filetype = finfo_file($fileinfo, $filepath);
            $company = $request->company;
            if ($fileSize === 0) {
                die("The file is empty.");
            }
            if ($fileSize > 3145728) { // 3 MB (1 byte * 1024 * 1024 * 3 (for 3 MB))
                die("The file is too large");
            }
            $notAllowedTypes = [
                'application/octet-stream',

            ];
            if(in_array($filetype, $notAllowedTypes)) {
                die("File not allowed. Please use a csv, tsv, or xlsx.");
            }

            $data = null;
            if ($company) {
                switch ($company) {
                    case null:
                        redirect()->route('importhome');
                        break;
                    case 'bavco':
                        $data = Excel::import(new BavcoPricingImport, $file);
                        break;
                    case 'siemens':
                        $data = Excel::import(new SiemensPricingImport, $file);
                        break;
                    case 'amerex':
                        $data = Excel::import(new AmerexPricingImport, $file);
                        $data2 = Excel::import(new AmerexPricingImportTwo, $file);
                        break;
                    case 'badger':
                        $data = Excel::import(new BadgerPricingImport, $file);
                        break;
                    case 'buckeye':
                        $data = Excel::import(new BuckeyePricingImport, $file);
                        break;
                    case 'farenhyt-silver':
                        $data = Excel::import(new FarenhytSilverPricingImport, $file);
                        break;
                    case 'gamewell-silver':
                        $data = Excel::import(new GamewellSilverPricingImport, $file);
                        break;
                    case 'rangeguard':
                        $data = Excel::import(new RangeguardPricingImport, $file);
                        break;
                    case 'azbattery':
                        $data = Excel::import(new AzbatteryPricingImport, $file);
                        break;
                    case 'brecco':
                        $data = Excel::import(new BreccoPricingImport, $file);
                        break;
                    case 'pyrochem':
                        $data = Excel::import(new PyrochemPricingImport, $file);
                        break;
                    case 'hughes':
                        $data = Excel::import(new HughesPricingImport, $file);
                        break;
                    case 'farenhyt-gold':
                        $data = Excel::import(new FarenhytGoldPricingImport, $file);
                        break;
                    case 'ferguson':
                        $data = Excel::import(new FergusonPricingImport, $file);
                        break;
                    case 'gamewell-gold':
                        $data = Excel::import(new GamewellGoldPricingImport, $file);
                        break;
                    default:
                }
                $datastatus = null;
                if ($data) {
                    $datastatus = $company . " import - upload to database was successful!";   
                } 
                $dbview = DB::table('costs')->orderBy('created_at', 'DESC')->where('item_cost','>',0)->limit(50)->get();
                return view('import.import-results')
                    ->with(compact(['dbview']))
                    ->with('datastatus', $datastatus);
            } else {
                return redirect()->route('importhome');
            }
        }
        else {
            return redirect()->route('importhome');
        }
    }
    public function uploadStatus() {
        return view('import.import-results')
            ->with('dbview', $dbview)
            ->with('datastatus', $datastatus);
    }

    public function updateList(Request $request) {
        $recperpage = 25;
        $pageno = 1;
        if ($request->recperpage) {
            $recperpage = $request->recperpage;
        }
        if ($request->pageno) {
            $pageno = $request->pageno;
        }
        $testdata = DB::table('costs')->orderBy('created_at', 'DESC')->where('item_cost','>',0)->get();
        $offset = ($pageno - 1) * $recperpage;
        $total_rows = count($testdata);
        $total_pages = ceil($total_rows / $recperpage);
        $sql = "LIMIT $offset, $recperpage"; 

        $data = DB::table('costs')
            ->offset($offset)
            ->orderBy('created_at', 'DESC')
            ->limit($recperpage)
            ->where('item_cost','>',0)
            ->get();
        return view('import.view-costs')
            ->with('pageno', $pageno)
            ->with('total_pages', $total_pages)
            ->with(compact(['data']));
    }

    public function makeList() {
        $testdata = DB::table('costs')->orderBy('created_at', 'DESC')->where('item_cost','>',0)->get();
        if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        if (isset($_GET['recperpage'])) {
            $recperpage = $_GET['recperpage'];
        } else {
            $recperpage = 25;
        }
        // dd($pageno);
        $offset = ($pageno) * $recperpage;
        $total_rows = count($testdata);
        $total_pages = ceil($total_rows / $recperpage);
        $sql = "LIMIT $offset, $recperpage"; 
        $data = DB::table('costs')
            ->offset($offset)
            ->orderBy('created_at', 'DESC')
            ->limit($recperpage)
            ->where('item_cost','>',0)
            ->get();
        return view('import.view-costs')
            ->with('pageno', $pageno)
            ->with('total_pages', $total_pages)
            ->with(compact(['data']));
    }

    public function viewAdmin() {
        return view ('adminer-4.8.1-mysql');

    }
}
