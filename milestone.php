<?php
	session_start();
	$pageTitle = 'Milestone';
	include ("v-templates/header.php");
?>
<!-- body starts here -->
<div id="profile_body_outline">
	<div class="container">
    	<div class="row profile_body_row">
        	<!-- body left section starts here -->
        	<div class="col-md-3 profile_left_part_outline">
                <div class="profile_box_outline project_list_leftbar_outline">
                	<div class="profile_box_heading">WORKROOM</div>
                    <ul class="profile_overview">
                    	<li><a href="message.php">Message</a></li>
                        <li><a href="milestone.php">Milestones</a></li>
                        <li><a href="#">Files</a></li>
                        <li><a href="#">My Proposal</a></li>
                        <li><a href="#">Billings & Invoice</a></li>
                    </ul>
                </div>
                <div class="profile_box_outline">
                	<div class="profile_box_heading">RUNNING PROJECTS</div>
                    <ul class="profile_overview">
                    	<li><a href="#">Lorem Ipsum</a></li>
                        <li><a href="#">Lorem Ipsum</a></li>
                        <li><a href="#">Lorem Ipsum</a></li>
                        <li><a href="#">Lorem Ipsum</a></li>
                        <li><a href="#">Lorem Ipsum</a></li>
                    </ul>
                </div>
            </div>
            <!-- body left section ends here -->
            <!-- body middle section starts here -->
            <div class="col-md-7 profile_middle_part_outline">
            	<div class="profile_box_outline billing_box_outline">
                	<div class="profile_box_heading">Workroom For: PROJECT NAME</div>
                    <div class="billing_box_inner">
                    	<div class="billing_page_heading">Milestones</div>
                        <div class="billing_info_outline">
                        	<div class="milestone_info_heading">Details</div>
                            <div class="milestone_info_table_outline">
                                <table class="table table-hover table-responsive billing_details_table">
                                    <thead>
                                        <tr>
                                            <th>Amount</th>
                                            <th>Description</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>$85.00</td>
                                            <td>2nd phase part1 (USD)</td>
                                            <td class="milestone_info_table_status">Released</td>
                                            <td>Lorem Ipsum</td>
                                        </tr>
                                        <tr>
                                            <td>$200.00</td>
                                            <td>2nd phase (USD)</td>
                                            <td class="milestone_info_table_status">Released</td>
                                            <td>Lorem Ipsum</td>
                                        </tr>
                                        <tr>
                                            <td>$50.00</td>
                                            <td>part2 - basic store (USD)</td>
                                            <td class="milestone_info_table_status">Released</td>
                                            <td>Lorem Ipsum</td>
                                        </tr>
                                        <tr>
                                            <td>$50.00</td>
                                            <td>front end design (USD)</td>
                                            <td class="milestone_info_table_status">Released</td>
                                            <td>Lorem Ipsum</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="milestone_total_amount">Total: $385.00</div>
                        </div>
                    </div>    
                </div>
                <div class="clearfix"></div>
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

