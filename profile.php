<?php
	session_start();
	$pageTitle = 'Profile';
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
        	<div class="col-md-3 profile_left_part_outline">
            	<img src="img/profile_image.png" class="profile_image" />
                <div class="profile_box_outline">
                	<div class="profile_box_heading">Hire ME</div>
                    <div class="hiring_rate">$15/Hour</div>
                </div>
                <div class="profile_box_outline">
                	<div class="profile_box_heading">Profile Overview</div>
                    <ul class="profile_overview">
                    	<li><a href="#">Full Profile</a></li>
			<li><a href="message.php">Accounts</a></li>
			<li><a href="#">Accounts</a></li>
                        <li><a href="#">Resume</a></li>
                        <li><a href="#">Portfolio</a></li>
                        <li><a href="#">Projects</a></li>
                        <li><a href="#">Reviews</a></li>
                        <li><a href="#">Accounts</a></li>
                    </ul>
                </div>
                <div class="profile_box_outline">
                	<div class="profile_box_heading">BIDS LEFT</div>
                    <div class="hiring_rate">39 Bids / 100 Bids</div>
                </div>
            </div>
            <!-- body left section ends here -->
            <!-- body middle section starts here -->
            <div class="col-md-7 profile_middle_part_outline">
            	<img src="img/cover_image.png" class="cover_image" />
                <div class="profile_box_outline">
                	<div class="profile_box_heading">Anand K. Singh</div>
                    <div class="hiring_rate profile_details">
                    	<p>Having 3+ years of industry experience enable me to groom as professional and skilled Web/Graphic Designer whereas zeal for learning always helps me to get enriched with latest trends of web world.</p>
                        <p>I've key experience in Web layout designing, brochure/flyer designing, etc.</p>
                        <p>I've also experienced in Logo designing so that my client can make lasting impact on Brand Equity.</p>
                        <p>My creativity and detailed note for perfection awarded my the 'Team Lead' position as I work closely with the teammates. I help them whenever I'm asked to or never hesitate to take their advice for any suitable outlook.</p>
                        <p>I am hard working and honest to deals.</p>
                        <div class="profile_info_outline">
                        	<div class="profile_info_box pull-left">
                            	<img src="img/expertise_icon.png"  class="profile_info_icon pull-left"/>
                                <div class="profile_info_text_outline pull-left">
                                	<div class="profile_info_heading">Expertise</div>
                                    <div class="profile_info_text">4 Years | Expert</div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="profile_info_box pull-left">
                            	<img src="img/availability_icon.png"  class="profile_info_icon pull-left" />
                                <div class="profile_info_text_outline pull-left">
                                	<div class="profile_info_heading">Availability</div>
                                    <div class="profile_info_text">Full Time, Part Time</div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="profile_info_box pull-left">
                            	<img src="img/interested_icon.png"  class="profile_info_icon pull-left" />
                                <div class="profile_info_text_outline pull-left">
                                	<div class="profile_info_heading">Interested In</div>
                                    <div class="profile_info_text">Paid</div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <!-- portfolio part start here -->
                <div class="profile_box_outline">
                	<div class="profile_box_heading">Portfolio</div>
                    <div class="portfolio_details">
                    	<div class="portfolio_part_outline">
                        	<div class="col-md-8 col-sm-8 col-xs-8">
                            	<div class="portfolio_part_heading">Website Design <span class="portfolio_part_share">Share</span></div>
                                <p>This contains heavy graphical artworks..</p>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-4"><img src="img/portfolio_image1.png" class="pull-right"/></div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="portfolio_part_outline">
                        	<div class="col-md-8 col-sm-8 col-xs-8">
                            	<div class="portfolio_part_heading">Website Design <span class="portfolio_part_share">Share</span></div>
                                <p>This contains heavy graphical artworks..</p>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-4"><img src="img/portfolio_image1.png" class="pull-right"/></div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="portfolio_part_outline">
                        	<div class="col-md-8 col-sm-8 col-xs-8">
                            	<div class="portfolio_part_heading">Website Design <span class="portfolio_part_share">Share</span></div>
                                <p>This contains heavy graphical artworks..</p>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-4"><img src="img/portfolio_image1.png" class="pull-right"/></div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="portfolio_part_outline borderless_box">
                        	<div class="col-md-8 col-sm-8 col-xs-8">
                            	<div class="portfolio_part_heading">Website Design <span class="portfolio_part_share">Share</span></div>
                                <p>This contains heavy graphical artworks..</p>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-4"><img src="img/portfolio_image1.png" class="pull-right"/></div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <!-- portfolio part ends here -->
                <!-- my skills part starts here -->
                <div class="profile_box_outline">
                	<div class="profile_box_heading">My Skills</div>
                    <div class="myskills_details">
                    	<div class="myskills_box pull-left">web design</div>
                        <div class="myskills_box pull-left">logo design</div>
                        <div class="myskills_box pull-left">content writer</div>
                        <div class="myskills_box pull-left">parallax design</div>
                        <div class="myskills_box pull-left">responsive design</div>
                        <div class="myskills_box pull-left">wireframe to psd</div>
                        <div class="myskills_box pull-left">brochure design</div>
                        <div class="myskills_box pull-left">flyer design</div>
                        <div class="myskills_box pull-left">poster design</div>
                        <div class="myskills_box pull-left">greetings card design</div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <!-- my skills part ends here -->
                <!-- my projects portion starts here -->
                <div class="profile_box_outline">
                	<div class="profile_box_heading">My Projects</div>
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
                </div>
                <!-- my projects portion ends here -->
            </div>
            <!-- body middle section ends here -->
            <!-- body right section starts here -->
            <div class="col-md-2 profile_right_part_outline">
            	<div class="add_place_outline"></div>
                <div class="add_place_outline"></div>
            </div>
            <!-- body right section ends here -->
        </div>
    </div>
</div>
<!-- body ends here -->
<?php
	include 'v-templates/footer.php';
?>
