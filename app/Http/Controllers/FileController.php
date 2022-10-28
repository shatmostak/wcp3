<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class FileController extends Controller
{

    public function verifyFiles()
    {
        // if (!isset($_FILES['upfile']['error']) || is_array($_FILES['upfile']['error']))
        // {
        //     throw new RuntimeException('Invalid parameters.');
        // }
        return true;

    }

}
