<?php
class AccountHandler{
	public function getAccount($employeeid,$password){
		$con = new Connect();
		$query = "SELECT * FROM user_information WHERE employeeNumber='".$employeeid."' AND password ='" .$password."'";
		$result = $con->select($query);
		if($result){
			// $query = "INSERT INTO audit_trail(Action,ip_address,username) VALUES ('SELECT;Login Successful','".$ip_address."','".$employeeid."')";
			// $audit_trail = $con->insert($query);

			return $result;
		}
		else{
			// $query = "INSERT INTO audit_trail(Action,ip_address,username) VALUES ('SELECT;Login Failed','".$ip_address."','".$employeeid."')";
			return $result;
		}
	}
	public function getAccountById($id){
		$con = new Connect();
		$query = "SELECT * FROM employeeAccounts WHERE idEmployeeAccounts=".$id;
		$result = $con->select($query);
		$audit_trail = $con->insert($query);
		return $result;
	}
}
?>