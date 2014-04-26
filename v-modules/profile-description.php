<!-- body left section starts here -->
<div class="col-md-3 profile_left_part_outline">
    <?php 
		//getting profie images
		$manageContent->getUserImage($_SESSION['user_id'],'pp'); 
	?>
    <div class="profile_box_outline">
        <?php
			//getting hourly rate of user
			$manageContent->getUserHourlyRate($_SESSION['user_id']);
		?>
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
    <?php 
		//getting cover images
		$manageContent->getUserImage($_SESSION['user_id'],'cp'); 
	?>
    <div class="profile_box_outline">
        <div class="profile_box_heading">Anand K. Singh</div>
        <div class="hiring_rate profile_details">
            <?php
				//getting cover images
				$manageContent->getUserDescription($_SESSION['user_id']); 
			?>
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
           <?php
				//getting cover images
				$manageContent->getUserPortfolio($_SESSION['user_id']); 
			?> 
        </div>
    </div>
    <!-- portfolio part ends here -->
    <!-- my skills part starts here -->
    <div class="profile_box_outline">
        <div class="profile_box_heading">My Skills</div>
        <div class="myskills_details">
             <?php
				//getting cover images
				$manageContent->getUserSkills($_SESSION['user_id']); 
			?>
            <div class="clearfix"></div>
        </div>
    </div>
    <!-- my skills part ends here -->
    <!-- my projects portion starts here -->
    <div class="profile_box_outline">
        <div class="profile_box_heading">My Projects</div>
        <div class="portfolio_details">
            <?php
				//getting cover images
				$manageContent->getUserProject($_SESSION['user_id']); 
			?>
            
            <!--<div class="portfolio_part_outline">
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
            </div>-->
        </div>
    </div>
    <!-- my projects portion ends here -->
</div>
<!-- body middle section ends here -->