<?php

namespace App\Http\Controllers;

use App\Pharmacist;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PagesController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {

//        $pharmacist = Pharmacist::findOrFail(Auth::user()->pharmacist_id);

//        dd(Session::get('data.userinfo')->id);
        return view('pages.dashboard');
    }

    public function resources() {
        return view('pages.resources');
    }
}
