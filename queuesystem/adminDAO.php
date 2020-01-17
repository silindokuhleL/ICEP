<?php

class AdminDAO {    
    public function __construct(){
		
    }
	
    public function addUser($con,$name, $lastname, $cellNumber, $email, $password, $role) {
		$password = password_hash($password, PASSWORD_DEFAULT);
		$checkEmail = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM tblLogin WHERE email = '$email'"));
		if(isset($checkEmail)) {
			return "Patient with the same email address already exist";
		} else {
			$sql = "INSERT INTO tblLogin(email,password,role) VALUES('$email','$password','$role')";
			$sqlUser = "INSERT INTO tbluser(name,lastname,cellNumber,email) VALUES('$name','$lastname','$cellNumber', '$email')";
			if(mysqli_query($con,$sql) AND mysqli_query($con,$sqlUser)) {	
				return "Successfully registered";
			} else  {
				return "Unsuccessfully registered";
			}
		}
    }
	
	public function makeAppointent($con,$userid, $appdate, $apptime, $description) {
		$checkSlot = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM tblappointment WHERE appdate = '$appdate' AND apptime = '$apptime'"));
		if(isset($checkSlot)) {
			return "Slot have already been booked by another patient";
		} else {
			$sql = "INSERT INTO tblappointment(userid,appdate,apptime,description) VALUES('$userid','$appdate','$apptime','$description')";
			if(mysqli_query($con,$sql)) {	
				return "Patient have successfully booked";
			} else  {
				return "Patient unsuccessfully booked";
			}
		}
	}
	
	public function treatePatient($con, $id) {
		$status = "Treated";
		$sql = "UPDATE tblappointment SET status ='$status' WHERE userid ='$id'";
		if ($con->query($sql) == TRUE){
			return "Patient successfully treated";
		} else {
			return "Something went wrong: error";
		}
			
    }
	
	public function updatePatient($con, $id, $status) {
		$result = mysqli_query($con,"SELECT * FROM tbluser where id = '$id'");
		if($row = mysqli_fetch_array($result)){
			$email = $row["email"];
			$sql = "UPDATE tblLogin SET status = '$status' WHERE email ='$email'";
			if ($con->query($sql) == TRUE){
				return 1;
			} else {
				return 0;
			}	
		}
		
    }
	
    public function updateUser($con,$id, $name, $lastname, $cellNumber, $email, $password) {
		$password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "UPDATE tbluser SET name ='$name', lastname ='$lastname', cellNumber = '$cellNumber' WHERE id ='$id'";
		$sqlLogin = "UPDATE tbllogin SET password ='$password' WHERE email ='$email'";
		if ($con->query($sql) == TRUE AND $con->query($sqlLogin) == TRUE){
			$_SESSION["name"] = $name;
			$_SESSION["lastname"] = $lastname;
			$_SESSION["email"] = $email;
			$_SESSION["cellNumber"] = $cellNumber;
			return "Personal details successfully updated";
		} else {
			return "Personal details unsuccessfully updated";
		}
    }
	
	public function getMyAppointment($con, $id) {
		$status = "Not Treated";
        $result = mysqli_query($con,"SELECT * FROM tblappointment where userId = '$id' and status = '$status'");
		if($row = mysqli_fetch_array($result)){
			$appdate = $row["appdate"];
			$apptime = $row["apptime"];
			return "you have an appointment on " . $appdate . " and time: " . $apptime;
		} else {
			return "";
		}
    }

	
	public function getAllPatients($con) {
		$role = "Patient";
        $sql = "SELECT u.id, u.name, u.lastname,u.email, u.cellNumber,l.role, l.password, l.status FROM tbllogin l, tbluser u where l.role = '$role' AND u.email = l.email";
		$check = mysqli_fetch_array(mysqli_query($con,$sql));
		$result = array();
		if(isset($check)){
			$result = $con->query($sql);
		}
		return $result;
    }
	
	public function getCurrentAppoitments($con, $current_date) {
		$role = "Patient";
        $sql = "SELECT u.id, u.name, u.lastname , a.appdate, a.apptime, a.description, a.status FROM tbllogin l, tbluser u, tblappointment a where l.role = '$role' AND u.email = l.email AND u.id = a.userId AND a.appdate = '$current_date'";
		$check = mysqli_fetch_array(mysqli_query($con,$sql));
		$result = array();
		if(isset($check)){
			$result = $con->query($sql);
		}
		return $result;
	}
	
	public function getAllAppoitments($con) {
		$role = "Patient";
        $sql = "SELECT u.id, u.name, u.lastname , a.appdate, a.apptime, a.description, a.status FROM tbllogin l, tbluser u, tblappointment a where l.role = '$role' AND u.email = l.email AND u.id = a.userId";
		$check = mysqli_fetch_array(mysqli_query($con,$sql));
		$result = array();
		if(isset($check)){
			$result = $con->query($sql);
		}
		return $result;
    }
	
	public function signin($email, $password, $con) {		
        $result = mysqli_query($con,"SELECT u.id, u.name, u.lastname,u.email, u.cellNumber,l.role, l.password, l.status FROM tbllogin l, tbluser u where l.email = '$email' AND u.email = l.email");
		if($row = mysqli_fetch_array($result)){
			if(password_verify($password, $row["password"])){
				if($row["status"] == "Active"){
					$role = $row["role"];
					$_SESSION["role"] = $row["role"];
					$_SESSION["id"] = $row["id"];
					$_SESSION["name"] = $row["name"];
					$_SESSION["lastname"] = $row["lastname"];
					$_SESSION["email"] = $row["email"];
					$_SESSION["cellNumber"] = $row["cellNumber"];
					$_SESSION["password"] = $row["password"];
						
					if($role == 'Doctor'){	
						return array('status' =>true,'page' => 'admin.php');
					} else {
						return array('status' =>true,'page' => 'patient.php');
					}
				}else {
					return array('status' =>false,'message' => 'User have been deactivated');
				}
			}
			else
			{
				return array('status' =>false,'message' => 'Wrong password!!!!');
			}
        }
		else
		{
			return array('status' =>false,'message' => 'Wrong username!!!!');
		}
	}
}