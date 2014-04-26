<?php
	//include the DAL library to use the model layer methods
	include 'class.DAL.php';
	
	// business layer class starts here
	class BLL_manageData
	{
		public $manage_content;
		
		/*
		- method for constructing DAL class
		- Auth: Dipanjan
		*/
		function __construct()
		{	
			$this->manage_content = new ManageContent_DAL();
			return $this->manage_content;
		}
		
		/*
		- method for creating user cookie
		- Auth: Dipanjan
		*/
		function createUserCookie($user_id)
		{
			//creating user cookie
			$cookie_exp_time = time() + (24*3600);
			$setCookie = $this->createCookie('uid',$user_id,$cookie_exp_time);
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
		- method for getting profile and cover image
		- Auth: Dipanjan
		*/
		function getUserImage($user_id,$image_type)
		{
			//getting values from databases
			$userDetails = $this->manage_content->getValue_where("user_info","*","user_id",$user_id);
			//for profile image
			if(!empty($userDetails[0]['profile_image']))
			{
				$profile_img = $userDetails[0]['profile_image'];
			}
			else
			{
				$profile_img = 'files/pro-image/default.jpg';
			}
			//for profile image
			if(!empty($userDetails[0]['cover_image']))
			{
				$cover_img = $userDetails[0]['cover_image'];
			}
			else
			{
				$cover_img = 'files/cov-image/default.png';
			}
			if($image_type == 'pp')
			{
				echo '<img src="'.$profile_img.'" class="profile_image" alt="Profile Image"/>';
			}
			else if($image_type == 'cp')
			{
				echo '<img src="'.$cover_img.'" class="cover_image" alt="Cover Image"/>';
			}
		}
		
		/*
		- method for getting user hourly rate
		- Auth: Dipanjan
		*/
		function getUserHourlyRate($user_id)
		{
			//getting values from databases
			$userDetails = $this->manage_content->getValue_where("user_info","*","user_id",$user_id);
			if(!empty($userDetails[0]['hourly_rate']))
			{
				$hourly_rate = '$'.$userDetails[0]['hourly_rate'].'/Hour';
			}
			else
			{
				$hourly_rate = 'Undefined';
			}
			echo '<div class="profile_box_heading">Hire ME</div>
        		<div class="hiring_rate">'.$hourly_rate.'</div>';
		}
		
		/*
		- method for getting user description
		- Auth: Dipanjan
		*/
		function getUserDescription($user_id)
		{
			//getting values from databases
			$userDetails = $this->manage_content->getValue_where("user_info","*","user_id",$user_id);
			
			echo '<p>'.$userDetails[0]['description'].'</p>';
		}
		
		/*
		- method for getting user portfolio
		- Auth: Dipanjan
		*/
		function getUserPortfolio($user_id)
		{
			//getting values from databases
			$userportfolios= $this->manage_content->getValue_where("user_portfolio","*","user_id",$user_id);
			
			if(!empty($userportfolios[0]))
			{
				//getting the last number of array and initialize parameter
				$last_key = end(array_keys($userportfolios));
				$i=0;
				
				foreach($userportfolios as $userportfolio)
				{
					echo '<div class="portfolio_part_outline'; if($i++ == $last_key) {echo ' borderless_box'; } echo'">
							<div class="col-md-8 col-sm-8 col-xs-8">
								<div class="portfolio_part_heading">'.$userportfolio['skills'].' <span class="portfolio_part_share">Share</span></div>
								<p>'.$userportfolio['description'].'</p>
							</div>
							<div class="col-md-4 col-sm-4 col-xs-4"><img src="'.$userportfolio['file'].'" class="pull-right"/></div>
							<div class="clearfix"></div>
						</div>';
				}
			}
			else
			{
				echo '<div class="portfolio_part_heading">You Have Not Uploaded Any Portfolio.</div>';
			}
		}
		
		/*
		- method for getting user skills
		- Auth: Dipanjan
		*/
		function getUserSkills($user_id)
		{
			//getting values from databases
			$userDetails = $this->manage_content->getValue_where("user_info","*","user_id",$user_id);
			
			if(!empty($userDetails[0]['skills']))
			{
				//seperating the comma(',') and making an array of skill element
				$skills = explode(',',$userDetails[0]['skills']);
				//showing them in page
				foreach($skills as $skill)
				{
					echo '<div class="myskills_box pull-left">'.$skill.'</div>';
				}
			}
			else
			{
				echo '<div class="portfolio_part_heading">You Have Not Choosed Any Skill.</div>';
			}
		}
		
		/*
		- method for getting user project
		- Auth: Dipanjan
		*/
		function getUserProject($user_id)
		{
			//getting values from databases
			$projectDetails = $this->manage_content->getValue_where("project_info","*","user_id",$user_id);
			
			if(!empty($projectDetails[0]))
			{
				//getting the last number of array and initialize parameter
				$last_key = end(array_keys($projectDetails));
				$i=0;
				
				//showing them in page
				foreach($projectDetails as $projectDetail)
				{
					//showing only top 4 projects
					if($i < 4)
					{
						//sub string the project description
						$sub_project_des = substr($projectDetail['description'],0,200);
						
						echo '<div class="portfolio_part_outline'; if($i++ == $last_key) {echo ' borderless_box'; } echo'">
								<div class="col-md-8 col-sm-8 col-xs-8">
									<div class="portfolio_part_heading">'.$projectDetail['title'].'<span class="portfolio_part_share">Share</span></div>
									<p>'.$sub_project_des.'</p>
								</div>';
						if($i == 4) 
						{ 
							echo '<div class="col-md-4 col-sm-4 col-xs-4"><div class="myprojects_more_button pull-right">MORE</div></div>'; 
						}
							
						echo '<div class="clearfix"></div>
							</div>';
					}	
				}
			}
			else
			{
				echo '<div class="portfolio_part_heading">You Have Not Posted Any Project.</div>';
			}
		}
		
	}
	
?>