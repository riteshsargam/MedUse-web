<?php 
	session_start();
	date_default_timezone_set('Asia/Kolkata');
	class login_function
	{
		private	$con;
		
		function __construct()
		{
			$this->con	=	new mysqli("localhost","root","", "MediCareDb");
		}
		
		function add_newUser($Name, $EmailId, $Username, $Password, $Gender)
		{
			$Date	=	date("Y-m-d");
			$Time	=	date("H:i:s");
			if($stmt	=	$this->con->prepare("INSERT INTO `UserRegistration`( `EmailId`, `Name`, `Username`, `Password`, `Gender`,`Date`,`Time`) VALUES (?,?,?,?,?,?,?)"))
			{
				$stmt->bind_param("sssssss", $EmailId, $Name, $Username, $Password, $Gender, $Date, $Time);
				if($stmt->execute())
				{
					return true;
				}	
				else
				{
					return false;
				}
			}
		}
	function get_password_from_username($w_username)
	{
		if ($stmt	=	$this->con->prepare("SELECT  `Password` FROM `UserRegistration` WHERE `Username`=?")) {
			$stmt->bind_param("s", $w_username);
			$stmt->bind_result($result_password);
			if ($stmt->execute()) {
				if ($stmt->fetch()) {
					return $result_password;
				}
			} else {
				return false;
			}
		}
	}
}
?>	