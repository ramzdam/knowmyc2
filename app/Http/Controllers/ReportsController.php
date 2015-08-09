<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ReportsController extends Controller
{
    public function index() {

    }

    public function search() {
        return view('reports.search');
    }

    public function generate() {
        return view('reports.generate');
    }
}
