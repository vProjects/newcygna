<!-- footer starts here -->

<div id="profile_footer_outline">
	<div class="container">
    	<div class="row profile_footer_row">
        </div>
    </div>
</div>
<!-- footer ends here -->
<?php
	//checking for session variable and showing the result
	if(isset($_SESSION['success']))
	{
		echo '<script type="text/javascript">alertSuccess("'.$_SESSION['success'].'");</script>';
		unset($_SESSION['success']);
	}
	else if(isset($_SESSION['warning']))
	{
		echo '<script type="text/javascript">alertWarning("'.$_SESSION['warning'].'");</script>';
		unset($_SESSION['warning']);
	}
?>
</body>
</html>