<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function getCompanyList()
    {
        $company = [
            'satu', 'dua', 'tiga'
        ];
        return response()->json($company, 200);
    }

    public function getCompanyDetail() {
        $company = [
            'abc',
            'def'
        ];
        return response()->json($company, 200);
    }
}
