<?php
	//include the DAL library to use the model layer methods
	include 'class.DAL.php';
	
	//include the utility library to get the browser info
	include 'class.utility.php';
	
	//include the utility library to upload the user files
	include 'class.upload_file.php';
	
	//include the DAL library to send the mail
	include 'class.mail.php';
	
	//class for fetching data of ajax request
	class fetchData
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
		- method for checking unique email id
		- Auth: Dipanjan
		*/
		function getUniqueEmail($email_id)
		{
			//getting all email id from database
			$allEmail = $this->manageContent->getValue('user_credentials','email_id');
			//initializing a parameter
			$emailCounter = 0;
			foreach($allEmail as $allEmails)
			{
				if($allEmails['email_id'] == $email_id)
				{
					$emailCounter = 1;
					break;
				}
			}
			echo $emailCounter;
		}
		
		/*
		- method for checking unique email id
		- Auth: Dipanjan
		*/
		function getUniqueUsername($username)
		{
			//getting all email id from database
			$allUser = $this->manageContent->getValue('user_credentials','username');
			//initializing a parameter
			$userCounter = 0;
			foreach($allUser as $allUsers)
			{
				if($allUsers['username'] == $username)
				{
					$userCounter = 1;
					break;
				}
			}
			echo $userCounter;
		}
			
	}
	
	/* receiving data from UI layer Form */
	//making object of class fetchData 
	$fetchData = new fetchData();
	//applying switch case
	switch($GLOBALS['_POST']['refData'])
	{
		//for unique email checking
		case 'emailChecking':
		{
			$emailChecking = $fetchData->getUniqueEmail($GLOBALS['_POST']['email']);
			break;
		}
		//for unique username checking
		case 'usernameChecking':
		{
			$usernameChecking = $fetchData->getUniqueUsername($GLOBALS['_POST']['username']);
			break;
		}
		default:
		{
			break;	
		}
	}

?>