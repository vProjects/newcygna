<?php
	session_start();
	$pageTitle = 'Bid Post';
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
    

	<div class="container">
    	<div class="row profile_body_row">
        	<!-- body left section starts here -->
        	<div class="col-md-8 profile_left_part_outline">
            	<div class="project_list_heading_bar project_description_outline">
                	<div class="project_description_title_text">Project Title</div>
                    <p class="post_bid_project_description">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                    <p class="post_bid_info_outline"><span class="post_bid_info_topic">Skills:</span> PHP, Javascript</p>
                    <p class="post_bid_info_outline"><span class="post_bid_info_topic">Price:</span> $500</p>
                    <p class="post_bid_info_outline"><span class="post_bid_info_topic">Preffered Location:</span> Anywhere</p>
                    <p class="post_bid_info_outline"><span class="post_bid_info_topic">Time Remaining:</span> 15 Days</p>
                    <p class="post_bid_info_outline"><span class="post_bid_info_topic">Uploaded Files:</span> No Files</p>
                </div>
                <div class="project_list_heading_bar">
                	<span class="pull-left">Proposal List</span>
                    <span class="pull-right">Total Bids: <b>5</b></span>
                    <div class="clearfix"></div>
                </div>
                <div class="project_details_outline post_bid_proposal_list">
                	<div class="col-md-2 post_bid_proposal_image_outline">
                    	<img src="img/dummy_profile.jpg" class="center-block" />
                    </div>
                    <div class="col-md-10 post_bid_proposal_outline">
                    	<div class="project_title_text post_bid_bidder_name"><a href="post_bid.html">Bidder Name</a></div>
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
                    	<div class="project_title_text post_bid_bidder_name"><a href="post_bid.html">Bidder Name</a></div>
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
                    	<div class="project_title_text post_bid_bidder_name"><a href="post_bid.html">Bidder Name</a></div>
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
                    	<div class="project_title_text post_bid_bidder_name"><a href="post_bid.html">Bidder Name</a></div>
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
                    	<div class="project_title_text post_bid_bidder_name"><a href="post_bid.html">Bidder Name</a></div>
                        <p class="project_part_description">I have a website with new domain. I want responsive design for my site. I will discuss the details of work after I choose the right person for it. Place your bids according to the requirement. You can freely ask your doubts.I have a website with new domain. I want responsive design for my site. I will discuss the details of work after I choose the right person for it. Place your bids according to the requirement. You can freely ask your doubts.</p>
                        <p class="post_bid_info_outline"><span class="post_bid_info_topic">Skills:</span> PHP, ASP.NET</p>
                        <p class="post_bid_info_outline"><span class="post_bid_info_topic">Price:</span> $500</p>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- body left section ends here -->
            <!-- body right section starts here -->
            <div class="col-md-4 profile_right_part_outline">
            	<div class="post_bid_section_outline">
                	<h4 class="post_bid_text">Describe Your Proposal</h4>
                    <form action="#" method="post" enctype="multipart/form-data">
                    	<textarea rows="20" class="form-control post_bid_textarea"></textarea>
                        <p>Cost</p>
                        <input type="text" class="form-control post_bid_textbox" />
                        <p>Time Required</p>
                        <input type="text" class="form-control post_bid_textbox" />
                        <p>Attach File</p>
                        <input type="file" class="post_bid_textbox"/>
                        <input type="submit" class="btn btn-success btn-lg pull-right" value="SUBMIT"/>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
            <!-- body right section ends here -->
        </div>
    </div>
</div>
<!-- body ends here -->
<?php
	include 'v-templates/footer.php';
?>
