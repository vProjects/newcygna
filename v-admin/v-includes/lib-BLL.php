<?php
	//include the DAL library to use the model layer methods
	include 'lib-DAL.php';
	
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
		- method for getting the member list
		- Auth : Dipanjan
		*/
		function getMemberList($userData)
		{
			if($userData['search_column'] == 'name')
			{
				$member_list = $this->manage_content->getValue_likely("user_info","*","name",$userData['search_value']);
			}
			else if($userData['search_column'] == 'email_id')
			{
				$member_list = $this->manage_content->getValue_likely("user_credentials","*","email_id",$userData['search_value']);
			}
			else if($userData['search_column'] == 'username')
			{
				$member_list = $this->manage_content->getValue_likely("user_credentials","*","username",$userData['search_value']);
			}
			
			//fetching the values to table
			if(!empty($member_list[0]))
			{
				echo '<table class="table table-bordered table-hover">
                        	<thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email Id</th>
                                    <th>Project Posted</th>
                                    <th>Bid On Job</th>
                                    <th>Profile</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>';
							
				foreach($member_list as $member)
				{
					//getting the email id and full name
					$email = $this->manage_content->getValue_where("user_credentials","*","user_id",$member['user_id']);
					$name = $this->manage_content->getValue_where("user_info","*","user_id",$member['user_id']);
					if($email[0]['status'] == 1)
					{
						$action_button = '<a href="user-list.php?uid='.$member['user_id'].'&action=0"><button class="btn btn-danger">Disable</button></a>';
					}
					else
					{
						$action_button = '<a href="user-list.php?uid='.$member['user_id'].'&action=1"><button class="btn btn-success">Enable</button></a>';
					}
					echo '<tr>
							<td>'.$name[0]['name'].'</td>
							<td>'.$email[0]['email_id'].'</td>
							<td><a href="memberProjectList.php?uid='.$member['user_id'].'"><button class="btn btn-primary">Project Details</button></a></td>
							<td><a><button class="btn btn-primary">Bid Details</button></a></td>
							<td><a><button class="btn btn-warning">Profile Details</button></a></td>
							<td>'.$action_button.'</td>
						</tr>';
				}
				
				echo '</tbody>
                      </table>';
				
			}
			else
			{
				echo 'No Member Found';
			}
		}
		
		/*
		- method for taking member action
		- Auth : Dipanjan
		*/
		function takingMemberAction($userData)
		{
			//getting the email id and full name
			$email = $this->manage_content->getValue_where("user_credentials","*","user_id",$userData['uid']);
			$name = $this->manage_content->getValue_where("user_info","*","user_id",$userData['uid']);
			if($userData['action'] == 0)
			{
				echo '<div class="col-lg-8">
						<div class="panel panel-default">
							<div class="panel-heading">Select The Reason For Deactivating The User</div>
							<div class="panel-body">
								<form action="v-includes/functions/memberUpgradation.php" role="form" method="post">
									<div class="form-group">
										<label class="control-label col-sm-3">Select Reason</label>
										<div class="col-sm-8">
											<select class="form-control" name="action_reason">
												<option value="lorem ipsum1">lorem ipsum1</option>
												<option value="lorem ipsum2">lorem ipsum2</option>
												<option value="lorem ipsum3">lorem ipsum3</option>
											</select>
										</div>
										<div class="clearfix"></div>
									</div>
									<div class="form-group">
										<div class="col-sm-8 col-sm-offset-3">
											<input type="hidden" name="action" value="'.$userData['action'].'"/>
											<input type="hidden" name="uid" value="'.$userData['uid'].'"/>
											<input type="submit" value="Taking Action" class="btn btn-danger"/>
										</div>
										<div class="clearfix"></div>
									</div>
								</form>
							</div>
						</div>
					</div>';
			}
			else if($userData['action'] == 1)
			{
				echo '<div class="col-lg-8">
						<div class="panel panel-default">
							<div class="panel-heading">Select The Reason For Activating The User</div>
							<div class="panel-body">
								<form action="v-includes/functions/memberUpgradation.php" role="form" method="post">
									<div class="form-group">
										<label class="control-label col-sm-3">Select Reason</label>
										<div class="col-sm-8">
											<div class="col-sm-8">
												<textarea rows="3" class="form-control" name="action_reason"></textarea>
											</div>
										</div>
										<div class="clearfix"></div>
									</div>
									<div class="form-group">
										<div class="col-sm-8 col-sm-offset-3">
											<input type="hidden" name="action" value="'.$userData['action'].'"/>
											<input type="hidden" name="uid" value="'.$userData['uid'].'"/>
											<input type="submit" value="Taking Action" class="btn btn-success"/>
										</div>
										<div class="clearfix"></div>
									</div>
								</form>
							</div>
						</div>
					</div>';
					
			}
		}
		
		/*
		- method for getting project details of a member
		- Auth : Dipanjan
		*/
		function getMemberProjectDetails($user_id)
		{
			//getting value from database
			$project_list = $this->manage_content->getValueWhere_descending("project_info","*","user_id",$user_id);
			
			if(!empty($project_list[0]))
			{
				echo '<div class="list-group list_item">';
				foreach($project_list as $project)
				{
					//sub string the project description and skills
					$project_des = substr($project['description'],0,300).'...';
					$project_skills = substr($project['skills'],0,30).'...';
							
					echo '<div class="list-group-item project_list_item">
							<h3 class="project_list_heading"><a href="project_details.php?pid='.$project['project_id'].'">'.$project['title'].'</a></h3>
							<p>'.$project_des.'</p>
							<div class="col-sm-4">
								<p>
									<span class="project_list_topic">Skills: </span>
									<span class="project_list_des">'.$project_skills.'</span>
								</p>
							</div>
							<div class="col-sm-4">
								<p>
									<span class="project_list_topic">Price: </span>
									<span class="project_list_des">'.$project['price_range'].'</span>
								</p>
							</div>
							<div class="col-sm-4">
								<p>
									<span class="project_list_topic">Job Posted On: </span>
									<span class="project_list_des">'.$project['date'].' '.$project['time'].'</span>
								</p>
							</div>
							<div class="clearfix"></div>
						</div>';
				}
				echo '</div>';
			}
			else
			{
				echo '<h3 class="project_list_heading">No Rresult Found</h3>';
			}
		}
		
		/*
		- method for getting project details of a project
		- Auth : Dipanjan
		*/
		function getProjectPageDetails($project_id)
		{
			//getting details of this project
			$project_details = $this->manage_content->getValue_where("project_info","*","project_id",$project_id);
			if(!empty($project_details[0]))
			{
				echo '<h3 class="project_list_heading"><a href="project_details.php?pid='.$project_id.'">'.$project_details[0]['title'].'</a></h3>
                      <p>'.$project_details[0]['description'].'</p>';
			}
			else
			{
				echo '<h3 class="project_list_heading">No Rresult Found</h3>';
			}
		}
		
		/*
		- method for getting project quick links of a project
		- Auth : Dipanjan
		*/
		function getProjectQuickLinks($project_id)
		{
			//getting details of this project
			$project_details = $this->manage_content->getValue_where("project_info","*","project_id",$project_id);
			if(!empty($project_details[0]))
			{
				echo '<div class="list-group list_item">
						<a class="list-group-item">Total Bids: 20</a>
						<a class="list-group-item">Job Is Open</a>
						<a class="list-group-item">Job Is Not Awarded</a>
						<a class="list-group-item">15 Days Left</a>
						<a class="list-group-item">Skills Required</a>
						<a class="list-group-item">Price Range</a>
						<a class="list-group-item"><button class="btn btn-danger">Terminate This Project</button></a>
					</div>';
			}
			else
			{
				echo '<h3 class="project_list_heading">No Rresult Found</h3>';
			}
		}
	}
	
?>