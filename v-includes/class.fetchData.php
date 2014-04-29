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
		
		/*
		- method for getting sub category of a category
		- Auth: Dipanjan
		*/
		function getSubCategory($category)
		{
			/* Initially we set sub categories are same */
			echo '<option value="Sub Category 1">Sub Category 1</option>
					<option value="Sub Category 2">Sub Category 2</option>
					<option value="Sub Category 3">Sub Category 3</option>
					<option value="Sub Category 4">Sub Category 4</option>
					<option value="Sub Category 5">Sub Category 5</option>';
		}
		
		/*
		- method for getting post project wok type details
		- Auth: Dipanjan
		*/
		function getWorkTypeDetails($work_type)
		{
			//checking for work type
			if($work_type == 'Hourly')
			{
				echo '<div class="rate_optional_text">
						<div class="pull-left">
							<select class="form-control pp_hourly_selectbox pull-left" name="hourly_rate" id="hourly_rate_list">
								<option value="">-- select hourly rate --</option>
								<option value="Less Than $10/hr">Less Than $10/hr</option>
								<option value="$10/hr to $15/hr">$10/hr to $15/hr</option>
								<option value="$15/hr to $20/hr">$15/hr to $20/hr</option>
								<option value="$20/hr to $30/hr">$20/hr to $30/hr</option>
								<option value="$30/hr to $40/hr">$30/hr to $40/hr</option>
								<option value="$40/hr to $50/hr">$40/hr to $50/hr</option>
								<option value="Above $50/hr">Above $50/hr</option>
								<option value="custom_price_hourly">Enter Custom Price Range</option>
							</select>
						</div>
						<div class="pull-left" id="pp_hourly_manual_rate">
							<input type="text" class="col-md-2 pull-left pp_form_textbox pp_form_pr_textbox" placeholder="min" name="hourly_custom_min" />
							<p class="pull-left"> To </p>
							<input type="text" class="col-md-2 pull-left pp_form_textbox pp_form_pr_textbox" placeholder="max" name="hourly_custom_max" />
							<div class="clearfix"></div>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="rate_optional_text" id="pp_hourly_info">
						<input type="text" class="col-md-2 pull-left pp_form_textbox pp_form_mini_textbox" name="hours_of_week"/>
						<p class="pull-left">hrs/week </p>
						<select class="form-control pp_total_week_selectbox pull-left" name="hourly_time_range">
							<option>-- select duration --</option>
							<option value="1-2 weeeks">1-2 weeks</option>
							<option value="3-4 weeks">3-4 weeks</option>
							<option value="1-2 months">1-2 months</option>
							<option value="3-4 months">3-4 months</option>
						</select>
						<div class="clearfix"></div>
					</div>
					<div class="clearfix"></div>';
			}
			else if($work_type == 'Fixed')
			{
				echo '<div class="rate_optional_text">
						<div class="pull-left" id="pp_fixed_rate">
							<select class="form-control pp_hourly_selectbox pull-left" name="fixed_rate" id="fixed_rate_list">
								<option value="">-- select fixed rate --</option>
								<option value="Less than $500">Less than $500</option>
								<option value="$500 to $1000">$500 to $1000</option>
								<option value="$1000 to $5000">$1000 to $5000</option>
								<option value="$5000 to $10000">$5000 to $10000</option>
								<option value="Above $10000">Above $10000</option>
								<option value="custom_price_fixed">Enter Custom Price Range</option>
							</select>
						</div>
						<div class="pull-left" id="pp_fixed_manual_rate">
							<input type="text" class="col-md-2 pull-left pp_form_textbox pp_form_pr_textbox" placeholder="min" name="fixed_custom_min" />
							<p class="pull-left"> To </p>
							<input type="text" class="col-md-2 pull-left pp_form_textbox pp_form_pr_textbox" placeholder="max" name="fixed_custom_max" />
							</div>
						<div class="clearfix"></div>
					</div>
					<div class="clearfix"></div>';
			}
		}
		
		/*
		- method for inserting profile crop image
		- Auth: Dipanjan
		*/
		function insertProfileImage($user_id,$cropData)
		{
			
		}
		
		/*
		- method for inserting survey feedback
		- Auth: Dipanjan
		*/
		function insertSurveyFeedback($user_id,$userData)
		{
			//checking for active survey set
			$active_survey_set = $this->manageContent->getValue_where("survey_info","*","status",1);
			$survey_set = $active_survey_set[0]['set_no'];
			//insert the value to survey feedback table
			$column_name = array("user_id","set_no","feedback");
			$column_value = array($user_id,$survey_set,$userData['feedback']);
			$insert = $this->manageContent->insertValue("survey_feedback",$column_name,$column_value);
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
		//for getting sub category in post project
		case 'gettingSubCategory':
		{
			$getSubCat = $fetchData->getSubCategory($GLOBALS['_POST']['category']);
			break;
		}
		//for getting post project work type details
		case 'gettingWorkTypeDetails':
		{
			$getWorkType = $fetchData->getWorkTypeDetails($GLOBALS['_POST']['work_type']);
			break;
		}
		//for inserting the crop image of profile image
		case 'gettingProfileCrop':
		{
			print_r($GLOBALS['_FILES']);
			//$getWorkType = $fetchData->getWorkTypeDetails($GLOBALS['_POST']['work_type']);
			break;
		}
		//for inserting the survey feedback
		case 'insertFeedbackReport':
		{
			$insertFeedback = $fetchData->insertSurveyFeedback($_SESSION['user_id'],$GLOBALS['_POST']);
			break;
		}
		default:
		{
			break;	
		}
	}

?>