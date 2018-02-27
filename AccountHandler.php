<?php
class AccountHandler{
	public function getAccount($username,$password){
		$con = new Connect();
		$query = "SELECT * FROM user WHERE username='".$username."' AND password ='" .$password."'";
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

	public function getAccounts(){
		$con = new Connect();
		$query = "SELECT * FROM user u INNER JOIN user_information ui ON u.iduser_information = ui.iduser_information WHERE u.accounttype = 2 AND u.status = 1;";
		$result = $con->select($query);
		return $result;
	}

	public function getAccountById($id){
		$con = new Connect();
		$query = "SELECT * FROM user u INNER JOIN user_information ui ON u.iduser_information = ui.iduser_information WHERE u.accounttype = 2 AND u.status = 1 AND iduser = ".$id.";";
		$result = $con->select($query);
		return $result;
	}

	public function getAccountByUsername($username){
		$con = new Connect();
		$query = "SELECT * FROM user WHERE username='".$username."';";
		$resulting = $con->select($query);
		if(isset($resulting)){
			if(mysqli_num_rows($resulting)>0){
				return $resulting;
			}else{
				return "";
			}
		}else{
			return "";	
		} 
	}

	public function getNameById($id){
		$con = new Connect();
		$query = "SELECT firstname, middlename, lastname FROM user_information,user WHERE user_information.iduser_information = user.iduser_information AND iduser=".$id;
		$resulting = $con->select($query);
		if(isset($resulting)){
			if(mysqli_num_rows($resulting)==1){
				foreach($resulting as $results){
					return $results["lastname"].", ".$results["firstname"]." ".$results["middlename"];	
				}
			}
		}else{
			return "";
		}
		
	}
}
?>