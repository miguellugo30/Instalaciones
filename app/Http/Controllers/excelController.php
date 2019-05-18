<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Exports\UsersExport;

class excelController extends Controller
{
    
    public function index()
    {

        return Excel::download(new UsersExport, 'instalaciones.xlsx');
        
    }
}
