<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Client;
use App\Business\ClientBusiness;

class ClientController extends Controller
{
    public function profile() {
    	$purchases = Auth::guard('client')->user()->purchases;
    	return view('client.profile', [
    		'purchases' => $purchases
    	]);
    }

    public function update(Request $request) {
    	$user = Auth::guard('client')->user();
    	$password = $request->input('senha');
    	if ($password != $request->input('novaSenha') && $password != "") {
    		return;
    	}
    	ClientBusiness::update($user->id, [
    		'name' => $request->input('nome'),
    		'email' => $request->input('email'),
    		'address' => $request->input('endereco'),
    		'password' => $password
    	]);
    	return;
    }

    public function delete(Request $request) {
    	$id = Auth::guard('client')->user()->id;
    	ClientBusiness::delete($id);
    	return route('/logout');
    }
}
