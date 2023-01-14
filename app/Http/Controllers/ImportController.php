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
        $company = $request->company;
        $data = null;
        switch ($company) {
            case null:
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
        if ($data) {
            $dbview = DB::table('costs')->orderBy('created_at', 'DESC')->limit(50)->get();
            $datastatus = $company . " import - upload to database was successful!";   
            return view('import.import-results')
                ->with(compact('dbview'))
                ->with(compact('datastatus'));
                
                // return view('import.import-results', compact(['datastatus', 'dbview']));
        } else {
            $datastatus = $company . " import - failed";
            return view('import.import-results')
                ->with(compact(['datastatus']));
        }
    }
    public function uploadStatus() {
        return view('import.import-results')
            ->with(compact(['datastatus', 'dbview']));
    }

    public function recentDbUpdates() {
        $data = DB::table('costs')->orderBy('created_at', 'DESC')->get();
        return view('import.recent-db')
            ->with(compact(['data']));
    }

    public function recent(Request $request) {
        dd($request);
        if ($request->ajax()) {

            $data = DB::table('costs')->orderBy('created_at', 'DESC')->limit(100)->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('import.recent-db')
            ->with(compact(['data']));
    }

}
