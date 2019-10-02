<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Business\ClientBusiness;

class ClientController extends Controller
{

    public function profile() {
    	return view('client.profile');
    }
}
