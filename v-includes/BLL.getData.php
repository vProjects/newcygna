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
			
			echo '<div class="profile_box_heading">'.$userDetails[0]['name'].'</div>
        			<div class="hiring_rate profile_details">
					<p>'.$userDetails[0]['description'].'</p>';
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
					//checking for job status = 1
					if($job['user_id'] != $user_id && time() <= strtotime($job['ending_date'].' 23:59:59') && $job['status'] == 1)
					{
						//checking for job no is in between the start point and end point or not
						if($jobNo >= $startNo && $jobNo < $endNo)
						{
							//sub string the project description
							$project_des = substr($job['description'],0,1000);
							//checking that user has bid on this project or not
							$bidState = $this->bidOnProject($job['project_id'],$user_id);
							if($bidState == 1)
							{
								$bid_icon = '<span class="pull-right project_bid_button"><img src="img/hammer.png" /><span class="project_bid_text">Bid</span></span>';
								//getting bid id
								$bid_id = $this->manage_content->getValueMultipleCondtn("bid_info","*",array("project_id","user_id"),array($job['project_id'],$user_id));
								$post_bid_icon = '<a href="post_bid.php?bid='.$bid_id[0]['bid_id'].'">'.$job['title'].'</a>';
							}
							else
							{
								$bid_icon = '';
								$post_bid_icon = '<a href="post_bid.php?pid='.$job['project_id'].'">'.$job['title'].'</a>';
							}
							//calculate time remaining for this project
							$datetime1 = new DateTime($this->getCurrentDate());
							$datetime2 = new DateTime($job['ending_date']);
							$interval = $datetime1->diff($datetime2);
							$int_day =  $interval->format('%a');
							if($int_day == 1)
							{
								$time_remaining = $int_day.' day Left';
							}
							else if($int_day == 0)
							{
								$time_remaining = 'Today Left';
							}
							else
							{
								$time_remaining = $int_day.' days Left';
							}
							//getting the skills for this project
							$job_skills = substr($job['skills'],0,20).'...';
							//getting total bids
							$total_bids = $this->manage_content->getRowValueMultipleCondition("bid_info",array("project_id","status"),array($job['project_id'],1));
							if($total_bids <= 1)
							{
								$total_bid_text = $total_bids.' Bid';
							}
							else
							{
								$total_bid_text = $total_bids.' Bids';
							}
							
							echo '<div class="project_details_outline">
									<div class="project_title_outline">
										<span class="pull-left project_title_text">'.$post_bid_icon.'</span>
										'.$bid_icon.'
										<div class="clearfix"></div>
									</div>
									<div class="project_part_details_outline">
										<p class="project_part_description">'.$project_des.'</p>
										<div class="project_list_info_outline">
											<span class="project_list_icon pull-left"><img src="img/time_icon.png" /></span>
											<span class="project_list_icon_text pull-left">'.$time_remaining.'</span>
											<span class="project_list_icon pull-left"><img src="img/skills_icon.png" /></span>
											<span class="project_list_icon_text pull-left">'.$job_skills.'</span>
											<span class="project_list_icon pull-left"><img src="img/price_icon.png" /></span>
											<span class="project_list_icon_text pull-left">'.$job['price_range'].'</span>
											<span class="project_list_icon pull-left"><img src="img/bids_icon.png" /></span>
											<span class="project_list_icon_text pull-left">'.$total_bid_text.'</span>
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
		- method for checking that user has submitted proposal on a project or not
		- Auth : Dipanjan
		*/
		function bidOnProject($project_id,$user_id)
		{
			//get the value of bid table
			$getValues = $this->manage_content->getValueMultipleCondtn("bid_info","*",array("project_id","status"),array($project_id,1));
			//initiate parameter
			$flag = 0;
			if(!empty($getValues[0]))
			{
				foreach($getValues as $getValue)
				{
					if($getValue['user_id'] == $user_id)
					{
						$flag = 1;
						break;
					}
				}
			}
			return $flag;
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
					//checking for job status = 1
					if($job['user_id'] != $user_id && time() <= strtotime($job['ending_date'].' 23:59:59') && $job['status'] == 1)
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
		
		/*
		- method for getting project details in bid page
		- Auth: Dipanjan
		*/
		function getProjectDetailsInBidPage($project_id)
		{
			//get project details
			$project_details = $this->manage_content->getValue_where("project_info","*","project_id",$project_id);
			
			//calculate time remaining for this project
			$datetime1 = new DateTime($this->getCurrentDate());
			$datetime2 = new DateTime($project_details[0]['ending_date']);
			$interval = $datetime1->diff($datetime2);
			$int_day =  $interval->format('%a');
			if($int_day == 1)
			{
				$time_remaining = $int_day.' day';
			}
			else if($int_day == 0)
			{
				$time_remaining = 'Today';
			}
			else
			{
				$time_remaining = $int_day.' days';
			}
			//setting values for upload file
			if(!empty($project_details[0]['file']))
			{
				$file_path = '<a href="'.$project_details[0]['file'].'" target="_blank">'.$project_details[0]['file_or'].'</a>';
			}
			else
			{
				$file_path = 'No Files';
			}
			//showing the result in page
			echo '<div class="project_description_title_text">'.$project_details[0]['title'].'</div>
				<p class="post_bid_project_description">'.$project_details[0]['description'].'</p>
				<p class="post_bid_info_outline"><span class="post_bid_info_topic">Skills:</span> '.$project_details[0]['skills'].'</p>
				<p class="post_bid_info_outline"><span class="post_bid_info_topic">Price:</span> '.$project_details[0]['price_range'].'</p>
				<p class="post_bid_info_outline"><span class="post_bid_info_topic">Preffered Location:</span> '.$project_details[0]['preferred_locations'].'</p>
				<p class="post_bid_info_outline"><span class="post_bid_info_topic">Time Remaining:</span> '.$time_remaining.'</p>
				<p class="post_bid_info_outline"><span class="post_bid_info_topic">Uploaded Files:</span> '.$file_path.'</p>';
		}
		
		/*
		- method for getting list of bids in post bid page
		- Auth: Dipanjan
		*/
		function getBidListInPostBidPage($project_id)
		{
			//get values from bid table
			$bids = $this->manage_content->getValueMultipleCondtn("bid_info","*",array("project_id","status"),array($project_id,1));
			//get total row value
			$bidRow = $this->manage_content->getRowValueMultipleCondition("bid_info",array("project_id","status"),array($project_id,1));
			
			//printing the header part
			echo '<div class="project_list_heading_bar">
					<span class="pull-left">Proposal List</span>
					<span class="pull-right">Total Bids: <b>'.$bidRow.'</b></span>
					<div class="clearfix"></div>
				</div>';
			
			//showing bid list of this project
			if(!empty($bids[0]))
			{
				foreach($bids as $bid)
				{
					//getting the personal info of bidder
					$perInfo = $this->manage_content->getValue_where("user_info","*","user_id",$bid['user_id']);
					//getting profile pic
					if(!empty($perInfo[0]['profile_image']))
					{
						$pro_img = $perInfo[0]['profile_image'];
					}
					else
					{
						$pro_img = 'img/dummy_profile.jpg';
					}
					//bidder skills
					$bidder_skills = substr($perInfo[0]['skills'],0,100).'...';
					//bid details
					$bid_text = substr($bid['description'],0,400).'...';
					
					//printing the info
					echo '<div class="project_details_outline post_bid_proposal_list">
							<div class="col-md-2 post_bid_proposal_image_outline">
								<img src="'.$pro_img.'" class="center-block" />
							</div>
							<div class="col-md-10 post_bid_proposal_outline">
								<div class="project_title_text post_bid_bidder_name"><a>'.$perInfo[0]['name'].'</a></div>
								<p class="project_part_description">'.$bid_text.'</p>
								<p class="post_bid_info_outline"><span class="post_bid_info_topic">Skills:</span> '.$bidder_skills.'</p>
								<p class="post_bid_info_outline"><span class="post_bid_info_topic">Price:</span> '.$bid['currency'].' '.$bid['amount'].'</p>
							</div>
							<div class="clearfix"></div>
						</div>';
				}
			}
			else
			{
				echo '<div class="portfolio_part_heading">No Proposals Yet</div>';
			}
		}
		
		/*
		- method for updating project id
		- Auth: Dipanjan
		*/
		function updateProjectPost($bid_id)
		{
			//get the bid details from database
			$bid_details = $this->manage_content->getValue_where("bid_info","*","bid_id",$bid_id);
			echo '<textarea rows="20" name="bid_pro" class="form-control post_bid_textarea">'.$bid_details[0]['description'].'</textarea>
					<p>Cost</p>
					<input type="text" name="bid_price" placeholder="Only write the amount" class="form-control post_bid_textbox post_bid_smltext" value="'.$bid_details[0]['amount'].'"/>
					<p>Time Required</p>
					<select name="time_range" class="form-control post_bid_textbox">';
					echo '<option value="1 Day"'; if($bid_details[0]['time_range'] == '1 Day') { echo 'selected="selected"';} echo '>1 Day</option>';
					echo '<option value="3 Days"'; if($bid_details[0]['time_range'] == '3 Days') { echo 'selected="selected"';} echo '>3 Days</option>';
					echo '<option value="5 Days"'; if($bid_details[0]['time_range'] == '5 Days') { echo 'selected="selected"';} echo '>5 Days</option>';
					echo '<option value="1 Week"'; if($bid_details[0]['time_range'] == '1 Week') { echo 'selected="selected"';} echo '>1 Week</option>';
					echo '<option value="2 Weeks"'; if($bid_details[0]['time_range'] == '2 Weeks') { echo 'selected="selected"';} echo '>2 Weeks</option>';
					echo '<option value="1 Month"'; if($bid_details[0]['time_range'] == '1 Month') { echo 'selected="selected"';} echo '>1 Month</option>';
					echo '<option value="2 Months"'; if($bid_details[0]['time_range'] == '2 Months') { echo 'selected="selected"';} echo '>2 Months</option>';
					echo '<option value="Above 2 Months"'; if($bid_details[0]['time_range'] == 'Above 2 Months') { echo 'selected="selected"';} echo '>Above 2 Months</option>';
			echo 	'</select>
					<p>Attach File</p>
					<input type="file" name="file" class="post_bid_textbox"/>
					<input type="hidden" name="bid" value="'.$bid_id.'" />
					<input type="hidden" name="fn" value="'.md5('update_bid').'" />
					<input type="submit" class="btn btn-success btn-lg pull-right" value="UPDATE"/>';
		}
		
		/*
		- method for getting job list by a user
		- Auth: Dipanjan
		*/
		function getUserJobList($user_id)
		{
			//getting bid list
			$bids = $this->manage_content->getValueMultipleCondtnDesc("bid_info","*",array("user_id","status"),array($user_id,1));
			if(!empty($bids[0]))
			{
				foreach($bids as $bid)
				{
					//getting project details
					$pro_details = $this->manage_content->getValue_where("project_info","*","project_id",$bid['project_id']);
					//getting user details of project post
					$project_user = $this->manage_content->getValue_where("user_info","*","user_id",$pro_details[0]['user_id']);
					if(!empty($project_user[0]['profile_image']))
					{
						$pro_pic = $project_user[0]['profile_image'];
					}
					else
					{
						$pro_pic = 'files/pro-image/default.jpg';
					}
					
					echo '<div class="project_details_outline post_bid_proposal_list">
							<div class="col-md-2 post_bid_proposal_image_outline">
								<img src="'.$pro_pic.'" class="center-block" />
							</div>
							<div class="col-md-10 post_bid_proposal_outline">
								<div class="project_title_text post_bid_bidder_name"><a href="#">'.$pro_details[0]['title'].'</a></div>
								<p class="project_part_description">'.substr($bid['description'],0,500).'</p>
								
								<p class="post_bid_info_outline"><span class="post_bid_info_topic">Price:</span> '.$bid['currency'].$bid['amount'].'</p>
								<p class="post_bid_info_outline"><span class="post_bid_info_topic">Time Range:</span> '.$bid['time_range'].'</p>
							</div>
							<div class="clearfix"></div>
						</div>';
				}
			}
			else
			{
				echo '<div class="portfolio_part_heading">No Jobs Yet.</div>';
			}
			
		}
		
		/*
		- method for getting project list of user
		- Auth: Dipanjan
		*/
		function getUserProjectList($user_id)
		{
			//get values from database
			$projects = $this->manage_content->getValueMultipleCondtnDesc("project_info","*",array("user_id","status"),array($user_id,1));
			if(!empty($projects[0]))
			{
				foreach($projects as $project)
				{
					echo '<div class="portfolio_part_outline">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="portfolio_part_heading"><a href="#">'.$project['title'].' </a><span class="portfolio_part_share">Share</span></div>
                                <p>'.substr($project['description'],0,500).'</p>
                            </div>
                            <div class="clearfix"></div>
                        </div>';
				}
			}
			else
			{
				echo '<div class="portfolio_part_heading">No Projects Found</div>';
			}
		}
		
		/*
		- method for getting project id
		- Auth: Dipanjan
		*/
		function getProjectIdFromBid($bid_id)
		{
			$bidRow = $this->manage_content->getValue_where("bid_info","*","bid_id",$bid_id);
			return $bidRow[0]['project_id'];
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
	
?>