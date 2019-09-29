<?php

namespace App\Business;

use Illuminate\Database\Eloquent\Model;
use App\Models\Admin;
use App\Models\User;

class AdminBusiness {
	public static function listAll() {
		return Admin::all()->get();
	}

	public static function list($id) {
		return Admin::where('id',$id)-get();
	}

	public static function create($name, $email, $login, $password) {
		$admin = new Admin;
		$admin->name = $name;
		$admin->email = $email;
		$admin->login = $login;
		$admin->password = $password;
		$admin->save();
		
		return $admin
	}

	public static function update($id, $newData) {
		Admin::where('id',$id)->update($newData);
	}

	public static function delete($id) {
		$admin = Admin::where('id',$id)->take(1)->get();
		$admin->user()->delete();
		$client->delete();
	}
}

?>