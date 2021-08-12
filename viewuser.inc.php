<?php

class ViewUser extends User {

	
	public function showAllUsers() {
		$datas = $this -> getAllUsers();
		foreach ($datas as $data)  {
			echo 'Customers last name is ' . $data['customer_lname']."<br>";
			echo 'Customers password is ' . $data['customer_password']."<br>";
		}
	}
}