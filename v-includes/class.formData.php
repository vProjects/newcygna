<?php
	session_start();
	//include the DAL library to use the model layer methods
	include 'class.DAL.php';
	
	//include the utility library to get the browser info
	include 'class.utility.php';
	
	//include the utility library to upload the user files
	include 'class.upload_file.php';
	
	//include the DAL library to send the mail
	include 'class.mail.php';
	
	//form data class starts here
	class formData
	{
		public $manageContent;
		public $manageUtility;
		public $manageFileUploader;
		public $mailSent;
		
		/*
		- method for constructing DAL, Utility, Mail class
		- Auth: Dipanjan
		*/	
		function __construct()
		{
			$this->manageContent = new ManageContent_DAL();
			$this->manageUtility = new utility();
			$this->manageFileUploader = new FileUpload();
			$this->mailSent = new Mail();
		}
		
		/*
		- method for sign up the new uesr
		- Auth: Dipanjan
		*/
		function userSignUp($userData)
		{
			//creating the unique user id
			$user_id = uniqid('user');
			//getting last sign in ip
			$last_sign_in_ip = $this->manageUtility->getIpAddress();
			//inserting values to database
			$column_name = array('user_id','email_id','username','password','category','sign_in_count','last_sign_in_ip');
			$column_value = array($user_id,$userData['email_id'],$userData['username'],$userData['password'],$userData['category'],1,$last_sign_in_ip);
			//calling DAL methode
			$insertValue = $this->manageContent->insertValue('user_credentials',$column_name,$column_value);
			if($insertValue == 1)
			{
				//set cookie value
				$cookie_exp_time = time() + (24*3600);
				$set_cookie = $this->createCookie('uid',$user_id,$cookie_exp_time);
			}
			return array($insertValue,$user_id);
		}
		
		/*
		- method for login the user
		- Auth: Dipanjan
		*/
		function userLogin($userData)
		{
			//at first we are checking that the input value is username or email id
			$presenceChar = strpos($userData['username'],'@');
			if(empty($presenceChar))
			{
				$column_name = 'username';
			}
			else
			{
				$column_name = 'email_id';
			}
			//getting the password from database
			$userCreden = $this->manageContent->getValue_where('user_credentials','*',$column_name,$userData['username']);
			if(!empty($userCreden[0]))
			{
				//checking for password field
				if($userCreden[0]['password'] == $userData['password'])
				{
					//setting cookie expiry time
					if($userData['loggedin_time'] == 'on')
					{
						$cookie_exp_time = time() + (2*7*24*3600);
					}
					else
					{
						$cookie_exp_time = time() + (24*3600);
					}
					//creating the cookie
					$set_cookie = $this->createCookie('uid',$userCreden[0]['user_id'],$cookie_exp_time);
					return array(1,'Login Successfull!!',$userCreden[0]['user_id'],$userCreden[0]['category']);
				}
				else
				{
					return array(0,'Username or Password Is Incorrect!!');
				}
			}
			else
			{
				return array(0,'Username or Password Is Incorrect!!');
			}
			
		}
		
		/*
		- method for setting cookie
		- Auth: Dipanjan
		*/
		function createCookie($cookie_name,$cookie_value,$exp_time)
		{
			//creating the cookie
			$path = '/';
			setcookie($cookie_name,$cookie_value,$exp_time,$path);
		}
		
		/*
		- method for getting current date
		- Auth: Dipanjan
		*/
		function getCurrentDate()
		{
			$date = date('y-m-d');
			return $date;
		}
		
		/*
		- method for getting current time
		- Auth: Dipanjan
		*/
		function getCurrentTime()
		{
			$time = date('h:i:s a');
			return $time;
		}
		
	}
	
	
	
	
	/* getting data from UI layer form */
	//creating object of form data class
	$formData = new formData();
	//applying switch case
	switch ($GLOBALS['_POST']['fn'])
	{
		//for sign up info
		case md5('signup'):
		{
			//checking for same password in two field
			if($GLOBALS['_POST']['password'] == $GLOBALS['_POST']['con_password'])
			{
				//calling userSignUp function to insert user credentials
				$userCreden = $formData->userSignUp($GLOBALS['_POST']);
				if($userCreden[0] == 1)
				{
					$_SESSION['success'] = 'Registration Successfull!!';
					$_SESSION['user_id'] = $userCreden[1];
					$_SESSION['user'] = $GLOBALS['_POST']['category'];
					header("Location: ../profile.php");
				}
				else
				{
					$_SESSION['warning'] = 'Registration Unsuccessfull!!';
					header("Location: ../sign_up.php");
				}
			}
			else
			{
				$_SESSION['warning'] = 'Password Fields Are Not Matching!!';
				header("Location: ../sign_up.php");
			}
			break;
		}
		//for login info
		case md5('login'):
		{
			//checking for empty username and password field
			if(!empty($GLOBALS['_POST']['username']) && !empty($GLOBALS['_POST']['password']))
			{
				//checking for login credentials verification
				$loginCreden = $formData->userLogin($GLOBALS['_POST']);
				if($loginCreden[0] == 0)
				{
					$_SESSION['warning'] = $loginCreden[1];
					header("Location: ../log_in.php");
				}
				else if($loginCreden[0] == 1)
				{
					$_SESSION['success'] = $loginCreden[1];
					$_SESSION['user_id'] = $loginCreden[2];
					$_SESSION['user'] = $loginCreden[3];
					header("Location: ../profile.php");
 				}
			}
			else
			{
				$_SESSION['warning'] = 'Username or Password Field Is Empty!!';
				header("Location: ../log_in.php");
			}
			break;
		}
		default:
		{
			break;
		}
	}




?>