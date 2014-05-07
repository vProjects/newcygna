<?php
	session_start();
	$pageTitle = 'Project Details';
	include 'v-templates/header.php';
?>
	<?php
		include 'v-templates/left_sidebar.php';
	?>
    <?php
		if(isset($GLOBALS['_GET']['pid'])) 
		{ $pid = $GLOBALS['_GET']['pid'];
	?>
    
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Project Details</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
            	<div class="col-lg-8">
                	<div class="panel panel-default">
                        <div class="panel-heading"><i class="fa fa-list fa-fw"></i> Project Details</div>
                        <div class="panel-body">
                        	<?php
								//getting the project details
								$manageContent->getProjectPageDetails($pid);
							?>
                        </div>
                    </div>
                    
                    <div class="panel panel-default">
                    	<div class="panel-heading"><i class="fa fa-list fa-fw"></i> Bid Details</div>
                        <div class="panel-body">
                        	<div class="list-group list_item">
                            	<div class="list-group-item project_list_item">
                                	<h4 class="project_list_heading"><a>Bidder Name</a></h4>
                                    <p>I have a website with new domain. I want responsive design for my site. I will discuss the details of work after I choose the right person for it. Place your bids according to the requirement. You can freely ask your doubts.I have a website with new domain. </p>
                                </div>
                                <div class="list-group-item project_list_item">
                                	<h4 class="project_list_heading"><a>Bidder Name</a></h4>
                                    <p>I have a website with new domain. I want responsive design for my site. I will discuss the details of work after I choose the right person for it. Place your bids according to the requirement. You can freely ask your doubts.I have a website with new domain. </p>
                                </div>
                                <div class="list-group-item project_list_item">
                                	<h4 class="project_list_heading"><a>Bidder Name</a></h4>
                                    <p>I have a website with new domain. I want responsive design for my site. I will discuss the details of work after I choose the right person for it. Place your bids according to the requirement. You can freely ask your doubts.I have a website with new domain. </p>
                                </div>
                                <div class="list-group-item project_list_item">
                                	<h4 class="project_list_heading"><a>Bidder Name</a></h4>
                                    <p>I have a website with new domain. I want responsive design for my site. I will discuss the details of work after I choose the right person for it. Place your bids according to the requirement. You can freely ask your doubts.I have a website with new domain. </p>
                                </div>
                                <div class="list-group-item project_list_item">
                                	<h4 class="project_list_heading"><a>Bidder Name</a></h4>
                                    <p>I have a website with new domain. I want responsive design for my site. I will discuss the details of work after I choose the right person for it. Place your bids according to the requirement. You can freely ask your doubts.I have a website with new domain. </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-8 -->
                
                <div class="col-lg-4">
                	<div class="panel panel-default">
                    	<div class="panel-heading"><i class="fa fa-bell fa-fw"></i> Quick Info</div>
                        <div class="panel-body">
                        	<?php
								//getting the project details
								$manageContent->getProjectQuickLinks($pid);
							?>
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php
		} // end of if condition
	include 'v-templates/footer.php';
?>
