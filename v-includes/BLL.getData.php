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
						
						echo '<div class="portfolio_part_outline'; if($i++ == $last_key || $i == 4) {echo ' borderless_box'; } echo'">
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
		
		/*
		- method for getting survey set active
		- Auth: Dipanjan
		*/
		function getSurveySet($user_id)
		{
			//checking for active survey set
			$active_survey_set = $this->manage_content->getValue_where("survey_info","*","status",1);
			$survey_set = $active_survey_set[0]['set_no'];
			//initialize the parameter
			$user_survey_status = 0;
			foreach($active_survey_set as $set_no)
			{
				//checking that user id gave the answers or not
				if(strpos($set_no['user_id'],$user_id) !== false)
				{
					$user_survey_status = 1;
					break;
				}
			}
			return array($user_survey_status,$survey_set);
		}
		
		/*
		- method for getting survey questions
		- Auth: Dipanjan
		*/
		function getSurveyQusetions($user_id,$survey_set_no,$action)
		{
			//getting the set which are active
			$active_set = $this->manage_content->getValueMultipleCondtn("survey_info","question_no",array("set_no"),array($survey_set_no));
			if(!empty($active_set[0]['question_no']))
			{
				//initialize an empty array
				$question_set = array();
				//seperating the identical questions in an array
				foreach($active_set as $set_question)
				{
					//checking that qestion number is present oin array or not
					if(!in_array($set_question['question_no'],$question_set))
					{
						//pushing the question number in array
						array_push($question_set,$set_question['question_no']);
					}
				}
				//getting the answers for each question
				if(!empty($question_set[0]))
				{
					foreach($question_set as $questions)
					{
						//getting the value from database
						$question_details = $this->manage_content->getValueMultipleCondtn("survey_info","*",array("question_no","set_no"),array($questions,$survey_set_no));
						//printing the question and the answers
						echo '<div class="col-md-12">
								<p class="question-font">'.$questions.'. '.$question_details[0]['question'].'</p>
								<div class="col-xs-12">';
						
						foreach($question_details as $question_detail)
						{
							
							echo '<div class="col-sm-6">
									<div class="col-sm-9">
										<div class="radio ans-font">';
										//this is for insert value
										if($action == 'insert')
										{
											echo '<label><input type="radio" name="q'.$questions.'" value="'.$question_detail['answer_no'].'">'.$question_detail['answer'].'</label>';
										}
										//this is after inserting value
										else if($action == 'update')
										{
											//checking that user id is present or not
											if(strpos($question_detail['user_id'],$user_id) !== false)
											{
												echo '<label><input type="radio" name="q'.$questions.'" value="'.$question_detail['answer_no'].'" checked="checked">'.$question_detail['answer'].'</label>';
											}
											else
											{
												echo '<label><input type="radio" name="q'.$questions.'" value="'.$question_detail['answer_no'].'">'.$question_detail['answer'].'</label>';
											}
										}
											
							echo		'</div>
									</div>
								</div>';
						}
						
						echo '</div>
							</div>';
					}
				}
			}
			
		}
		
		/*
		- method for getting survey feedback
		- Auth: Dipanjan
		*/
		function getSurveyFeedback($user_id,$survey_set_no)
		{
			//checking for user submitted the feedback or not
			$user_feed = $this->manage_content->getValueMultipleCondtn("survey_feedback","*",array("user_id","set_no"),array($user_id,$survey_set_no));
			if(empty($user_feed[0]))
			{
				return 0;
			}
			else
			{
				return 1;
			}
			
		}
		
		/*
		- method for getting poll set no of user id
		- Auth: Dipanjan
		*/
		function getPollSet($user_id)
		{
			//checking for active poll set
			$poll_set = $this->manage_content->getValue_where("polling_info","*","status",1);
			if(!empty($poll_set[0]))
			{
				//initialize an empty array
				$poll_set_array = array();
				//getting the set no of all active items
				foreach($poll_set as $poll_sets)
				{
					if(!in_array($poll_sets['set_no'],$poll_set_array))
					{
						array_push($poll_set_array,$poll_sets['set_no']);
					}
				}
			}
			if(!empty($poll_set_array[0]))
			{
				//getting the poll set no where user id not present
				foreach($poll_set_array as $set_array)
				{
					//initialize the parameter
					$poll_set_no = '';
					//getting the answers of this set no
					$answer = $this->manage_content->getValue_where("polling_info","*","set_no",$set_array);
					foreach($answer as $answer_set)
					{
						if(strpos($answer_set['user_id'],$user_id) !== false)
						{
							$poll_set_no = $set_array;
							break;
						}
					}
					//checking that poll set no is set or not
					if(empty($poll_set_no))
					{
						return $set_array;
						break;
					}
				}
			}
		}
		
		/*
		- method for getting polling questions
		- Auth: Dipanjan
		*/
		function getPollingDetails($set_no)
		{
			//getting the info from database
			$poll_details = $this->manage_content->getValue_where("polling_info","*","set_no",$set_no);
			//showing them in page
			echo '<div class="profile_box_outline" id="poll_outline">
					<div class="profile_box_heading">POLL</div>
					<div class="poll-box">
						<div class="col-md-12">
							<p class="pole-question-font" id="'.$set_no.'">'.$poll_details[0]['question'].'</p>';
							
			foreach($poll_details as $poll_detail)
			{
				echo '<div class="col-sm-12">
						<div class="radio pole-ans">
							<label>
								<input type="radio" class="poll_radio_button" name="option" value="'.$poll_detail['answer_no'].'">'.$poll_detail['answer'].'</p>
							</label>
						</div>
					</div>';
			}
					
							echo '<div class="col-sm-12">				
								<button class="btn btn-primary btn-lg" id="poll_report">Submit</button>				
							</div>
							</div>
						<div class="clearfix"></div>
					</div>				
				</div>';
		}
		
		/*
		- method for getting latest project list
		- Auth: Dipanjan
		*/
		function getProjectListOfCategory($user_id,$cat,$sub,$page)
		{
			//getting the job list of this category
			if($cat == '' && $sub == '')
			{
				$jobs = $this->manage_content->getValue_descendingLimit("project_info","*",500);
				//creating page url for pagination
				$pageUrl = 'project_list.php?';
			}
			else if($cat != '' && $sub == '')
			{
				$jobs = $this->manage_content->getValue_likely_descendingLimit("project_info","*","category",$cat,100);
				//creating page url for pagination
				$pageUrl = 'project_list.php?cat='.$cat.'&';
			}
			else if($cat != '' && $sub != '')
			{
				$jobs = $this->manage_content->getValue_likely_descendingTwoLimit("project_info","*","category",$cat,"sub_category",$sub,100);
				//creating page url for pagination
				$pageUrl = 'project_list.php?cat='.$cat.'&sub='.$sub.'&';
				
			}
			
			//setting max no of index
			$max_index = 5;
			$limit = 5;
						
			//printing the div outline here
			echo '<div class="project_list_heading_bar">
					<span class="pull-left">Projects</span>';
					
					//getting the pageination
					$pagination = $this->pagination($page,$jobs,$user_id,$pageUrl,$max_index,$limit);
			
			echo '<div class="clearfix"></div>
				</div>';
			
			//calculate the rows number to be shown in this page
			$startNo = $page*$limit;
			$endNo = ($page + 1)*$limit;
			//showing the project list	
			if(!empty($jobs))
			{
				//initialize a parameter to show the result
				$jobNo = 0;
				foreach($jobs as $job)
				{
					//reject the jobs which have posted by this user
					//checking for job ending date exceeds the current date or not
					if($job['user_id'] != $user_id && time() <= strtotime($job['ending_date']))
					{
						//checking for job no is in between the start point and end point or not
						if($jobNo >= $startNo && $jobNo < $endNo)
						{
							//sub string the project description
							$project_des = substr($job['description'],0,1000);
							
							echo '<div class="project_details_outline">
									<div class="project_title_outline">
										<span class="pull-left project_title_text"><a href="post_bid.php">'.$job['title'].'</a></span>
										<span class="pull-right project_bid_button"><img src="img/hammer.png" /><span class="project_bid_text">Bid</span></span>
										<div class="clearfix"></div>
									</div>
									<div class="project_part_details_outline">
										<p class="project_part_description">'.$project_des.'</p>
										<div class="project_list_info_outline">
											<span class="project_list_icon pull-left"><img src="img/time_icon.png" /></span>
											<span class="project_list_icon_text pull-left">15 Days Left</span>
											<span class="project_list_icon pull-left"><img src="img/skills_icon.png" /></span>
											<span class="project_list_icon_text pull-left">PHP, Javascript</span>
											<span class="project_list_icon pull-left"><img src="img/price_icon.png" /></span>
											<span class="project_list_icon_text pull-left">$ 500</span>
											<span class="project_list_icon pull-left"><img src="img/bids_icon.png" /></span>
											<span class="project_list_icon_text pull-left">31 Bids</span>
											<div class="clearfix"></div>
										</div>
										<div class="clearfix"></div>
									</div>
								</div>';
						}
						//increment the parameter
						$jobNo++;
					}
				}
			}
			else
			{
				echo '<div class="portfolio_part_heading">No Project Found</div>';
			}
			
			echo '<div class="project_list_heading_bar bottom_pagination">';
					
					//getting the pageination
					$pagination = $this->pagination($page,$jobs,$user_id,$pageUrl,$max_index,$limit);
			
			echo '<div class="clearfix"></div>
				</div>';
		}
		
		/*
		- method for getting the value of the pagination
		- Auth : Dipanjan
		*/
		function pagination($page,$jobList,$user_id,$pageUrl,$max_no_index,$limit)
		{
			//getting no of rows to be fetched
			//initialize a parameter
			$rows = 0;
			if(!empty($jobList[0]))
			{
				foreach($jobList as $job)
				{
					//reject the jobs which have posted by this user
					//checking for job ending date exceeds the current date or not
					if($job['user_id'] != $user_id && time() <= strtotime($job['ending_date']))
					{
						//increment the counter
						$rows++;
					}
				}
			}
			
			//used in the db for getting o/p
			$startPoint = $page*$limit ;
			//no of page to be displayed
			$no_page = $rows/$limit ;
			//show pagination when there is more than one page is there
			if($no_page > 1)
			{
				$no_page = intval($no_page) + 1;
				//set no of index to be displayed
				$no_index = 1 ;
				
				//generate the pagination UI
				echo '<span class="pull-right">
						<ul class="pagination pagination-sm project_list_pagination_outline">';
				//logic for setting the prev button
				//condition for escaping the -ve page index when $page = 0
				
				if( ($page-1) < 0 && $page != 0 )
				{
					echo '<li><a class="pagination_arrow" href="'.$pageUrl.'p=0"> <img src="img/pagination_left_arrow.png" /></a></li>';
				}
				elseif( $page != 0 )
				{
					echo '<li><a class="pagination_arrow" href="'.$pageUrl.'p='.($page-1).'"> <img src="img/pagination_left_arrow.png" /></a></li>';
				}
				/*for the indexes*/
				//index initilization variable
				if( ( $page + 1 ) >= ( $no_page - $max_no_index + 1))
				{
					$inti_i = $no_page - $max_no_index + 1 ;
				}
				else
				{
					$inti_i = $page + 1 ;
				}
				for( $i = $inti_i ; $i <= $no_page ; $i++ )
				{
					if( $i > 0 )
					{
						echo '<li><a ';
						//codes for active class
						if( $page == ( $i - 1 ) )
						{
							echo ' class="pagination_active" ';
						}
						echo 'href="'.$pageUrl.'p='.($i-1).'">'.$i.'</a></li>' ;
						//increment the index no by 1
						$no_index++ ;
						if( $no_index > $max_no_index )
						{
							break ;
						}
					}
				}
				if( $page != ( $no_page - 1 ) )
				{
					//for the next button
					echo '<li><a class="pagination_arrow" href="'.$pageUrl.'p='.($page + 1).'"><img src="img/pagination_right_arrow.png" /> </a></li>' ;
				}
				//for the last button
				//echo '<li><a href="'.$PageUrl.'?p='.($no_page - 1).'&limit='.$limit.'">Last</a></li>' ;
				echo	 '</ul>
					</span>';
			}
			
		}
		
		
		/*
		- method for getting category and sub category list
		- Auth: Dipanjan
		*/
		function getProjectCategoryList($cat,$sub)
		{
			if(!empty($cat))
			{
				if(!empty($sub))
				{
					for($i=1;$i<=7;$i++)
					{
						if($cat == 'Category'.$i)
						{
							echo '<li class="pro_cat profile_overview_active"><a href="project_list.php?cat=Category'.$i.'">Category'.$i.'</a></li>';
							echo '<ul class="profile_overview profile_1st_child_nav">';
							for($j=1;$j<=5;$j++)
							{
								if($sub == 'Sub Category '.$j)
								{
									echo '<li><i class="glyphicon glyphicon-chevron-right profile_ovr_icon"></i><a href="project_list.php?cat=Category'.$i.'&sub=Sub Category '.$j.'">Sub Category '.$j.'</a></li>';
								}
								else
								{
									echo '<li><i class="glyphicon glyphicon-chevron-right profile_ovr_icon"></i><a href="project_list.php?cat=Category'.$i.'&sub=Sub Category '.$j.'">Sub Category '.$j.'</a></li>';
								}
								
							}
							echo '</ul>';
						}
						else
						{
							echo '<li class="pro_cat"><a href="project_list.php?cat=Category'.$i.'">Category'.$i.'</a></li>';
						}
					}
				}
				else
				{
					for($i=1;$i<=7;$i++)
					{
						if($cat == 'Category'.$i)
						{
							echo '<li class="pro_cat profile_overview_active"><a href="project_list.php?cat=Category'.$i.'">Category'.$i.'</a></li>';
							echo '<ul class="profile_overview profile_1st_child_nav">';
							for($j=1;$j<=5;$j++)
							{
								echo '<li><i class="glyphicon glyphicon-chevron-right profile_ovr_icon"></i><a href="project_list.php?cat=Category'.$i.'&sub=Sub Category '.$j.'">Sub Category '.$j.'</a></li>';
							}
							echo '</ul>';
						}
						else
						{
							echo '<li class="pro_cat"><a href="project_list.php?cat=Category'.$i.'">Category'.$i.'</a></li>';
						}
					}
				}
			}
			else
			{
				for($i=1;$i<=7;$i++)
				{
					echo '<li class="pro_cat"><a href="project_list.php?cat=Category'.$i.'">Category'.$i.'</a></li>';
				}
			}
		}
	}
	
?>