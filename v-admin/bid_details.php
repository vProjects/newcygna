<?php
	session_start();
	$pageTitle = 'Project Details';
	include 'v-templates/header.php';
?>
	<?php
		include 'v-templates/left_sidebar.php';
	?>
    <?php
		if(isset($GLOBALS['_GET']['bid'])) 
		{ $bid = $GLOBALS['_GET']['bid'];
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
								$manageContent->getProjectDetailsOfBid($bid);
							?>
                        </div>
                    </div>
                    
                    <div class="panel panel-default">
                    	<div class="panel-heading"><i class="fa fa-list fa-fw"></i> Bid Details</div>
                        <div class="panel-body">
                        	<div class="list-group list_item">
                            	<?php
									//getting bid details of given bid
									$manageContent->getDetailsOfBid($bid);
								?>
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
								$manageContent->getBidQuickLinks($bid);
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
