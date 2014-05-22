<?php
	session_start();
	$pageTitle = 'Bid List';
	include 'v-templates/header.php';
?>
	<?php
		include 'v-templates/left_sidebar.php';
	?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Bid List</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
            	<div class="col-lg-12">
                	<div class="panel panel-default">
                        <div class="panel-heading"><i class="fa fa-list fa-fw"></i> List Of Bid Posted</div>
                        <div class="panel-body">
                        	<?php
								if(isset($GLOBALS['_GET']['uid']))
								{
									//getting the project details
									$manageContent->getMemberBidDetails($GLOBALS['_GET']['uid']);
								}
								else
								{
									echo '<h3 class="project_list_heading">No Rresult Found</h3>';
								}
							?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php
	include 'v-templates/footer.php';
?>
