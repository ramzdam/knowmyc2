<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Account;
use App\Http\Requests\CreateAccountRequest;
use App\Pharmacist;
use App\Pharmacy;
use Carbon\Carbon;
use App\Http\Requests;

use App\Http\Controllers\Controller;
use Session;

class AccountsController extends Controller
{
    public function register() {
        return view('accounts.register');
    }

    public function index() {
//        dd(date('Y-m-d H:i:s'));
//        dd(Carbon::now());
        return redirect('accounts/create');
    }

    public function create() {
        return view('accounts.create');
    }

    public function store(CreateAccountRequest $request) {
//        $input = Request::all();
        $pharmacy = Pharmacy::create([
            "name"            => $request->get('name'),
            "address"         => $request->get('address'),
            "city"            => $request->get('city'),
            "state"           => $request->get('state'),
            "zipcode"         => $request->get('zipcode'),
            "npi"             => $request->get('npi'),
            "dea"             => $request->get('dea'),
            "nabp"            => $request->get('nabp'),
            "pic"             => $request->get('pic'),
            "contact"         => $request->get('contact'),
            "contact_person"  => $request->get('contact_person'),
            "email"           => $request->get('email'),
            "billing_address" => $request->get('billing_address'),
            "billing_city"    => $request->get('billing_city'),
            "billing_state"   => $request->get('billing_state'),
            "billing_zipcode" => $request->get('billing_zipcode'),
            "mailing_address" => $request->get('mailing_address'),
            "mailing_city"    => $request->get('mailing_city'),
            "mailing_state"   => $request->get('mailing_state'),
            "mailing_zipcode" => $request->get('mailing_zipcode'),
        ]);

        $pharmacists = new Pharmacist([
            "fname" => $request->get('name'),
            "mname" => $request->get('name'),
            "lname" => $request->get('name'),
            "bdate" => date('Y-m-d'),
            "email" => $request->get('email'),
            "contact" => $request->get('contact'),
        ]);

        $account = new Account([
            "username" => $request->get('username'),
            "password" => $request->get('password'),
            "rights"   => "0",
            "date_created" => date('Y-m-d')
        ]);



        $pharmacy->pharmacists()->save($pharmacists)->account()->save($account);
        Session::flash('flash_message', 'Registration Successful!');
        return redirect('/login');
    }
}
