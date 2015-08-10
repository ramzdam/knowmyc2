<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class InventoryController extends Controller
{
    public function __construct() {
//        $this->middleware('auth');
    }
    public function index() {
        return view('inventory.index');
    }

    public function add() {
        return view('inventory.add');
    }
}
