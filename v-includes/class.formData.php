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
			$column_value = array($user_id,$userData['email_id'],$userData['username'],md5($userData['password']),$userData['category'],1,$last_sign_in_ip);
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
				if($userCreden[0]['password'] == md5($userData['password']))
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
					//calculating total number of sign in
					$sign_in = $userCreden[0]['sign_in_count'] + 1;
					//getting last sign in ip
					$last_sign_in_ip = $this->manageUtility->getIpAddress();
					//updatin the values
					$update1 = $this->manageContent->updateValueWhere("user_credentials","sign_in_count",$sign_in,"user_id",$userCreden[0]['user_id']);
					$update2 = $this->manageContent->updateValueWhere("user_credentials","last_sign_in_ip",$last_sign_in_ip,"user_id",$userCreden[0]['user_id']);
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
		- method for insert personal info
		- Auth: Dipanjan
		*/
		function insertPersonalInfo($user_id,$userData)
		{
			//setting user full name
			$name = $userData['f_name']." ".$userData['l_name'];
			//profile creation date
			$profile_creation_date = $this->getCurrentDate();
			//last updation date
			$last_updation_date = $this->getCurrentDate();
			//column name for insertion
			$column_name = array("user_id","name","gender","dob","contact_no","addr_line1","addr_line2","pincode","city","state","country","profile_creation_date","last_upgradation_date");
			//column value for insertion
			$column_value = array($user_id,$name,$userData['gender'],$userData['dob'],$userData['contact'],$userData['add1'],$userData['add2'],$userData['pin'],$userData['city'],$userData['state'],$userData['country'],$profile_creation_date,$last_updation_date);
			//insert the values to user info table
			$insert = $this->manageContent->insertValue("user_info",$column_name,$column_value);
		}
		
		/*
		- method for insert user image info
		- Auth: Dipanjan
		*/
		function insertUserImage($user_id,$userData,$userFile)
		{
			//image desired name
			$pro_desired_name = md5('pro'.$user_id);
			$cov_desired_name = md5('cov'.$user_id);
			//uploading profile pic
			if(!empty($userFile['pro_pic']))
			{
				$pro_pic = $this->manageFileUploader->upload_file($pro_desired_name,$userFile['pro_pic'],'../files/pro-image/');
				$pro_pic_file = 'files/pro-image/'.$pro_pic;
			}
			else
			{
				$pro_pic_file = '';
			}
			
			print_r($userFile['cov_pic']);
			//uploading cover pic
			if(!empty($userFile['cov_pic']))
			{
				echo 'abc';
				$cov_pic = $this->manageFileUploader->upload_file($cov_desired_name,$userFile['cov_pic'],'../files/cov-image/');
				$cov_pic_file = 'files/cov-image/'.$cov_pic;
			}
			else
			{
				$cov_pic_file = '';
			}
			
			//updating the value in database
			$update_pro_image = $this->manageContent->updateValueWhere("user_info","profile_image",$pro_pic_file,"user_id",$user_id);
			
			//updating the value in database
			$update_cov_image = $this->manageContent->updateValueWhere("user_info","cover_image",$cov_pic_file,"user_id",$user_id);
			return array($update_pro_image,$update_cov_image);
			
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
		//for insert personal info
		case md5('personal_info'):
		{
			//calling the insert function
			$insertPersInfo = $formData->insertPersonalInfo($_SESSION['user_id'],$GLOBALS['_POST']);
			//returning to edit profile page
			$_SESSION['success'] = 'Your Personal Info Inserted Successfully!!';
			header("Location: ../edit_profile.php");
			break;
		}
		//for uploading image info
		case md5('image_info'):
		{
			$insertUserImage = $formData->insertUserImage($_SESSION['user_id'],$GLOBALS['_POST'],$GLOBALS['_FILES']);
			if($insertUserImage[0] == 1 && $insertUserImage[1] == 1)
			{
				$_SESSION['success'] = 'Update Successfull!!';
			}
			else
			{
				$_SESSION['warning'] = 'Update Unsuccessfull!!';
			}
			header("Location: ../edit_profile.php");
			break;
		}
		default:
		{
			break;
		}
	}




?>