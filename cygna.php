<?php
	session_start();
	$pageTitle = 'MyCygna';
	if(!isset($GLOBALS['_COOKIE']['uid']) && !isset($_SESSION['user_id']))
	{
		header("Location: log_in.php");
	}
	include ("v-templates/header.php");
?>
<!-- body starts here -->
<div id="profile_body_outline">
	
    <!-- div for showing success message--->
	<div class="alert alert-success" id="success_msg"></div>
	<!-- div for showing warning message--->
	<div class="alert alert-danger" id="warning_msg"></div>
    <?php
		if(isset($GLOBALS['_GET']))
		{
			$option = $GLOBALS['_GET']['op'];
		}
	?>

	<div class="container">
    	<div class="row profile_body_row">
        	<!-- body left section starts here -->
        	<div class="col-md-3 profile_left_part_outline">
                <div class="profile_box_outline project_list_leftbar_outline">
                	<div class="profile_box_heading">Quick Links</div>
                    <ul class="profile_overview">
                    	<li><a href="cygna.php?op=job">JobList</a></li>
                        <li><a href="cygna.php?op=pro">ProjectList</a></li>
                        <li><a href="message.php">Message</a></li>
                        <!--<li><a href="post_bid.php">My Proposal</a></li>
                        <li><a href="#">Billings & Invoice</a></li>-->
                    </ul>
                </div>
                <?php
					include 'v-modules/user-running-projects.php';
				?>
			<?php
				include ("v-modules/polling.php");
			?>	
			</div>	
			
            <!-- body left section ends here -->
            <!-- body right section starts here -->
           <div class="col-md-8 profile_left_part_outline">
           		<?php
					if(isset($option) && $option == 'job')
					{
						echo '<div class="project_list_heading_bar">
								<span class="pull-left">Job List</span>
								<span class="pull-right">Total awards: <b>5</b></span>
								<div class="clearfix"></div>
							</div>';
						
						$manageContent->getUserJobList($_SESSION['user_id']);
						
						echo '<div class="project_list_heading_bar bottom_pagination">
								<div class="clearfix"></div>
							</div>';
					}
					else if(isset($option) && $option == 'pro')
					{
						echo '<div class="project_list_heading_bar">
								<span class="pull-left">Project List</span>
								
								<div class="clearfix"></div>
							</div>
							<div class="profile_box_outline">
                    			<div class="portfolio_details">';
						
						$manageContent->getUserProjectList($_SESSION['user_id']);
							
						echo '</div>
							</div>
							<div class="project_list_heading_bar bottom_pagination">
								<div class="clearfix"></div>
							</div>';
					}
				?>
           
           
           
                
                <!--<div class="project_details_outline post_bid_proposal_list">
                	<div class="col-md-2 post_bid_proposal_image_outline">
                    	<img src="img/dummy_profile.jpg" class="center-block" />
                    </div>
                    <div class="col-md-10 post_bid_proposal_outline">
                    	<div class="project_title_text post_bid_bidder_name"><a href="escrow.php">Job Name</a></div>
                        <p class="project_part_description">I have a website with new domain. I want responsive design for my site. I will discuss the details of work after I choose the right person for it. Place your bids according to the requirement. You can freely ask your doubts.I have a website with new domain. I want responsive design for my site. I will discuss the details of work after I choose the right person for it. Place your bids according to the requirement. You can freely ask your doubts.</p>
                        <p class="post_bid_info_outline"><span class="post_bid_info_topic">Skills:</span> PHP, ASP.NET</p>
                        <p class="post_bid_info_outline"><span class="post_bid_info_topic">Price:</span> $500</p>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="project_details_outline post_bid_proposal_list">
                	<div class="col-md-2 post_bid_proposal_image_outline">
                    	<img src="img/dummy_profile.jpg" class="center-block" />
                    </div>
                    <div class="col-md-10 post_bid_proposal_outline">
                    	<div class="project_title_text post_bid_bidder_name"><a href="escrow.php">Job Name</a></div>
                        <p class="project_part_description">I have a website with new domain. I want responsive design for my site. I will discuss the details of work after I choose the right person for it. Place your bids according to the requirement. You can freely ask your doubts.I have a website with new domain. I want responsive design for my site. I will discuss the details of work after I choose the right person for it. Place your bids according to the requirement. You can freely ask your doubts.</p>
                        <p class="post_bid_info_outline"><span class="post_bid_info_topic">Skills:</span> PHP, ASP.NET</p>
                        <p class="post_bid_info_outline"><span class="post_bid_info_topic">Price:</span> $500</p>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="project_details_outline post_bid_proposal_list">
                	<div class="col-md-2 post_bid_proposal_image_outline">
                    	<img src="img/dummy_profile.jpg" class="center-block" />
                    </div>
                    <div class="col-md-10 post_bid_proposal_outline">
                    	<div class="project_title_text post_bid_bidder_name"><a href="escrow.php">Job Name</a></div>
                        <p class="project_part_description">I have a website with new domain. I want responsive design for my site. I will discuss the details of work after I choose the right person for it. Place your bids according to the requirement. You can freely ask your doubts.I have a website with new domain. I want responsive design for my site. I will discuss the details of work after I choose the right person for it. Place your bids according to the requirement. You can freely ask your doubts.</p>
                        <p class="post_bid_info_outline"><span class="post_bid_info_topic">Skills:</span> PHP, ASP.NET</p>
                        <p class="post_bid_info_outline"><span class="post_bid_info_topic">Price:</span> $500</p>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="project_details_outline post_bid_proposal_list">
                	<div class="col-md-2 post_bid_proposal_image_outline">
                    	<img src="img/dummy_profile.jpg" class="center-block" />
                    </div>
                    <div class="col-md-10 post_bid_proposal_outline">
                    	<div class="project_title_text post_bid_bidder_name"><a href="escrow.php">Job Name</a></div>
                        <p class="project_part_description">I have a website with new domain. I want responsive design for my site. I will discuss the details of work after I choose the right person for it. Place your bids according to the requirement. You can freely ask your doubts.I have a website with new domain. I want responsive design for my site. I will discuss the details of work after I choose the right person for it. Place your bids according to the requirement. You can freely ask your doubts.</p>
                        <p class="post_bid_info_outline"><span class="post_bid_info_topic">Skills:</span> PHP, ASP.NET</p>
                        <p class="post_bid_info_outline"><span class="post_bid_info_topic">Price:</span> $500</p>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="project_details_outline post_bid_proposal_list">
                	<div class="col-md-2 post_bid_proposal_image_outline">
                    	<img src="img/dummy_profile.jpg" class="center-block" />
                    </div>
                    <div class="col-md-10 post_bid_proposal_outline">
                    	<div class="project_title_text post_bid_bidder_name"><a href="escrow.php">Job Name</a></div>
                        <p class="project_part_description">I have a website with new domain. I want responsive design for my site. I will discuss the details of work after I choose the right person for it. Place your bids according to the requirement. You can freely ask your doubts.I have a website with new domain. I want responsive design for my site. I will discuss the details of work after I choose the right person for it. Place your bids according to the requirement. You can freely ask your doubts.</p>
                        <p class="post_bid_info_outline"><span class="post_bid_info_topic">Skills:</span> PHP, ASP.NET</p>
                        <p class="post_bid_info_outline"><span class="post_bid_info_topic">Price:</span> $500</p>
                    </div>
                    <div class="clearfix"></div>
                </div>-->
                
                
                <!--<div class="project_list_heading_bar pro_list_myproject">
                	<span class="pull-left">Project List</span>
                    
                    <div class="clearfix"></div>
                </div>
                <div class="profile_box_outline">
                    <div class="portfolio_details">
                        <div class="portfolio_part_outline">
                            <div class="col-md-8 col-sm-8 col-xs-8">
                                <div class="portfolio_part_heading">Website Design <span class="portfolio_part_share">Share</span></div>
                                <p>This contains heavy graphical artworks..</p>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-4"></div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="portfolio_part_outline">
                            <div class="col-md-8 col-sm-8 col-xs-8">
                                <div class="portfolio_part_heading">Website Design <span class="portfolio_part_share">Share</span></div>
                                <p>This contains heavy graphical artworks..</p>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-4"></div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="portfolio_part_outline">
                            <div class="col-md-8 col-sm-8 col-xs-8">
                                <div class="portfolio_part_heading">Website Design <span class="portfolio_part_share">Share</span></div>
                                <p>This contains heavy graphical artworks..</p>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-4"></div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="portfolio_part_outline borderless_box">
                            <div class="col-md-8 col-sm-8 col-xs-8">
                                <div class="portfolio_part_heading">Website Design <span class="portfolio_part_share">Share</span></div>
                                <p>This contains heavy graphical artworks..</p>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-4"><div class="myprojects_more_button pull-right">MORE</div></div>
                            <div class="clearfix"></div>
                        </div>
                   </div>
                </div>-->
            </div>
            <!-- body right section ends here -->
        </div>
    </div>
</div>
</div>
<!-- body ends here -->
<?php
	include 'v-templates/footer.php';
?>
