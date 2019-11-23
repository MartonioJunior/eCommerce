<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Admin;
use App\Models\Client;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Category;
use App\Business\AdminBusiness;

class AdminController extends Controller
{
    public function profile() {
    	return view('admin.profile', [
    		'products' => Product::all(),
    		'categories' => Category::all(),
    		'clients' => Client::all(),
    		'purchases' => Purchase::all()
    	]);
    }

    public function update(Request $request) {
    	$adminID = Auth::guard('admin')->user()->id;
    	$newName = $request->input('nome');
    	$newEmail = $request->input('email');
    	$newPassword = $request->input('senha');
    	$passwordConfirm = $request->input('novaSenha');
    	$newData = [
    		'name' => $newName,
    		'email' => $newEmail
    	];
    	if ($newPassword != "" && $newPassword == $passwordConfirm) {
    		$newData['password'] = Hash::make($newPassword);
    	}
    	AdminBusiness::update($adminID, $newData);
    	return back();
    }

    public function delete(Request $request) {
    	$id = Auth::guard('admin')->user()->id;
    	AdminBusiness::delete($id);
    	return redirect('/logout');
    }
}
