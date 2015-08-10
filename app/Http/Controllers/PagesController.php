<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
//        dd(Auth::check());


        return view('pages.dashboard');
    }
}
