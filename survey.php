<?php
	session_start();
	$pageTitle = 'Survey';
	include ("v-templates/header.php");
?>

<!-- body starts here -->

<div id="profile_body_outline">
	
    <!-- div for showing success message--->
	<div class="alert alert-success" id="success_msg"></div>
	<!-- div for showing warning message--->
	<div class="alert alert-danger" id="warning_msg"></div>
    
	<div class="container">

	<!-- sign up box starts here -->

	<div class="row">
		<div class="col-md-8 col-md-offset-1">
			<h2 class="post_project_top_heading">SURVEY OUR WEBSITE</h2>
		</div>
	</div>

		<div class="row">

			<div class="col-md-8 col-md-offset-1">

				<div class="login-box">
                	<?php
						$survey_stat = $manageContent->getSurveySet($_SESSION['user_id']);
						if($survey_stat[0] == 0)
						{
					?>
                    
                    <form action="v-includes/class.formData.php" method="post" role="form" class="survey_form">
						 <?php
                            $manageContent->getSurveyQusetions($_SESSION['user_id'],$survey_stat[1],'insert');
                         ?>
                         <div class="col-sm-12">
                         	<input type="hidden" name="fn" value="<?php echo md5('survey_report'); ?>" />
                            <input type="submit" class="btn btn-primary btn-lg center-block" value="SUBMIT" />
                         </div>
                         <div class="clearfix"></div>
                     </form>
					
					<?php
						}
						else
						{
							$manageContent->getSurveyQusetions($_SESSION['user_id'],$survey_stat[1],'update');
						}
					?>
                    
                    <?php
						$userSurveyReport = $manageContent->getSurveyFeedback($_SESSION['user_id'],$survey_stat[1]);
						if($userSurveyReport == 0)
						{
					?>
					<div class="col-sm-12">

                            <div class="col-sm-offset-1 col-sm-9">		

                                    <textarea class="form-control survey_feedback_resize" id="survey_report" rows="2" placeholder=" Your feedback"></textarea>

                            </div>

                            <div class="col-sm-2"><button class="btn btn-info btn-marg btn-lg" id="survey_feddback">Submit</button></div>

						<div class="clearfix"></div>		

					</div>
                    
                    <?php } ?>

					<div class="clearfix"></div>

				</div>

				<div class="clearfix"></div>

			</div>

		

		<!-- sign up box ends here -->

		</div>


</div>
</div>
<!-- body ends here -->

<?php
	include 'v-templates/footer.php';
?>


