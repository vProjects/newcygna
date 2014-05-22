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
    
	<?php
		if(isset($GLOBALS['_GET']['pid']) || isset($GLOBALS['_GET']['bid'])) 
		{
			if(isset($GLOBALS['_GET']['pid']))
			{
				$pid = $GLOBALS['_GET']['pid']; 
			}
			else if(isset($GLOBALS['_GET']['bid']))
			{
				$bid = $GLOBALS['_GET']['bid'];
				//get the project id
				$pid = $manageContent->getProjectIdFromBid($bid);
			}
			
	?>
	<div class="container">
    	<div class="row profile_body_row">
        	<!-- body left section starts here -->
        	<div class="col-md-8 profile_left_part_outline">
            	<?php
					include 'v-modules/post-bid-project-details.php';
				?>
                <?php
					include 'v-modules/project-bid-list.php';
				?>
            </div>
            <!-- body left section ends here -->
            <!-- body right section starts here -->
            <div class="col-md-4 profile_right_part_outline">
            	<?php
					include 'v-modules/post-bid-proposal-section.php';
				?>
            </div>
            <!-- body right section ends here -->
        </div>
    </div>
    <?php } else { echo '<div class="portfolio_part_heading">Page Not Found.. Error Occured..</div>'; } ?>
</div>
<!-- body ends here -->
<?php
	include 'v-templates/footer.php';
?>
