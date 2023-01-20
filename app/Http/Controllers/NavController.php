<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use mysqli_result;


class NavController extends Controller
{


    public function livewire()
    {


    }
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

    public function query() {
        if (!function_exists('mysqli_init') && !extension_loaded('mysqli')) {
            echo 'Why you no have mysqli!!!';
        } else {
            echo 'Day is saved!';
        }
        $db_host = $_SERVER["DB_HOST"];
        $db_username = $_SERVER["DB_USERNAME"];
        $db_password = $_SERVER["DB_PASSWORD"];
        $db_database = $_SERVER["DB_DATABASE"];
        // Create connection
        $conn = new \mysqli($db_host, $db_username, $db_password, $db_database);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM costs ORDER BY created_at DESC LIMIT 100";
        $result = $conn->query($sql);
        foreach ($result as $row) {
            var_dump($row->fetch_assoc());

            # code...
        }
        $displayresult = $result->fetch_assoc();
        $conn->close();
    }

}
