<?php
	//including the bll get data class
	include 'v-includes/BLL.getData.php';
	$manageContent = new BLL_manageData();
	
	if(isset($GLOBALS['_COOKIE']['uid']) && !isset($_SESSION['user_id']))
	{
		$_SESSION['user_id'] = $GLOBALS['_COOKIE']['uid'];
	}
	else if(!isset($GLOBALS['_COOKIE']['uid']) && isset($_SESSION['user_id']))
	{
		//setting cookie value
		$manageContent->createUserCookie($_SESSION['user_id']);
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" type="text/css" href="dist/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="dist/css/bootstrap-theme.css" />
<link rel="stylesheet" type="text/css" href="dist/css/jquery.Jcrop.min.css" />
<link rel="stylesheet" type="text/css" href="dist/css/style.css" />

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="dist/js/bootstrap.js"></script>
<script src="js/validiation.js"></script>
<script src="js/asynch-function.js"></script>
<script src="js/element-effect.js"></script>
<script src="js/jquery.Jcrop.min.js"></script>
<title>CYGNATECH | <?php echo $pageTitle; ?></title>
</head>

<body>
<!-- header starts here -->
<div class="navbar navbar-fixed-top profile_header_outline" role="navigation">
	<div class="container">
    	<div class="row profile_header_row">
        	<div class="col-sm-12">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#profile_header_nav">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="glyphicon glyphicon-align-justify"></span>
                    </button>
                    <a class="navbar-brand profile_header_brand" href="index.php"><img src="img/page_logo.png" alt="logo"/></a>
                </div>
                
                <!-- Collect the nav links, forms, and other content for toggling -->
                <?php //include("nav.php") ?>
            </div>
        </div>
    </div>
    <?php include("post-nav.php") ?>
</div>
<!-- header ends here -->


