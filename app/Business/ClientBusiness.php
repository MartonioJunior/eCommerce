<?php

namespace App\Business;

use Illuminate\Database\Eloquent\Model;
use App\Models\Client;
use App\Models\User;

class ClientBusiness {
	public static function listAll() {
		return Client::all()->get();
	}

	public static function list($id) {
		return Client::where('id',$id)-get();
	}

	public static function create($name, $email, $login, $password, $address) {
		$client = new Client;
		$client->name = $name;
		$client->email = $email;
		$client->login = $login;
		$client->password = $password;
		$client->address = $address;
		$client->save();
		
		return $client;
	}

	public static function update($id, $newData) {
		Client::where('id',$id)->update($newData);
	}

	public static function delete($id) {
		$client = Client::where('id',$id)->take(1)->get();
		$client->user()->delete();
		$client->delete();
	}
}

?>