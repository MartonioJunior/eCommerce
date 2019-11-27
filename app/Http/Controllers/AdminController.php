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
        $products = $this->productReport();
    	return view('admin.profile', [
    		'products' => Product::all(),
    		'categories' => Category::all(),
    		'clients' => [],
    		'purchases' => Purchase::all(),
            'revenues' => [],
            'start' => "2019-09-07",
            'end' => date("Y-m-d")
    	]);
    }

    public function revenue(Request $request) {
        $GLOBALS['status'] = "request";
        $startDate = $request->input("startDate");
        $endDate = $request->input("endDate");
        $clients = $this->clientReport(strtotime($startDate), strtotime($endDate));
        $products = $this->productReport();
        $revenues = $this->moneyReport(strtotime($startDate), strtotime($endDate));
        $GLOBALS['status'] = "display";
        return view('admin.profile', [
            'products' => Product::all(),
            'categories' => Category::all(),
            'clients' => $clients,
            'purchases' => Purchase::all(),
            'revenues' => $revenues,
            'start' => $startDate,
            'end' => $endDate
        ]);
    }

    public function moneyReport($timeStart, $timeEnd) {
        $purchases = Purchase::all();
        $dict_revenue = [];
        foreach (Purchase::all() as $purchase) {
            $item = [];
            $date = $purchase->dateOfPurchase();
            $time = strtotime($date);
            if ($time < $timeStart || $time > $timeEnd) {
                continue;
            }
            if (array_key_exists($date, $dict_revenue)) {
                $dict_revenue[$date]["amount"] += $purchase->getTotalValue();
            } else {
                $item["amount"] = $purchase->getTotalValue();
                $item["date"] = $date;
                $dict_revenue[$date] = $item;
            }
        }
        usort($dict_revenue, function($a, $b) {
            $timeA = strtotime($a["date"]);
            $timeB = strtotime($b["date"]);
            return $timeA > $timeB;
        });
        return $dict_revenue;
    }

    public function productReport() {
        $products = [];
        foreach (Product::all() as $product) {
            array_push($products, $product);
        }
        $results = usort($products, function($a, $b) {
            return $a->description > $b->description;
        });
        return $products;
    }

    public function clientReport($startTime, $endTime) {
        $clients = [];
        $GLOBALS['startTime'] = $startTime;
        $GLOBALS['endTime'] = $endTime;
        foreach (Client::all() as $client) {
            array_push($clients, $client);
        }
        $filteredResults = array_filter($clients, function($obj) {
            return $obj->getNumberOfPurchasesFrom($GLOBALS['startTime'], $GLOBALS['endTime']) != 0;
        });
        usort($filteredResults, function($a, $b) {
            return $a->getNumberOfPurchasesFrom($GLOBALS['startTime'], $GLOBALS['endTime']) < $b->getNumberOfPurchasesFrom($GLOBALS['startTime'], $GLOBALS['endTime']);
        });
        return $filteredResults;
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
