<?php
	session_start();
	$pageTitle = 'Project Post';
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
                <div class="profile_box_outline project_list_leftbar_outline">
                	<div class="profile_box_heading">CATEGORIES</div>
                    <ul class="profile_overview">
                    	<li><a href="#">Category Title</a></li>
                        <li><a href="#">Category Title</a></li>
                        <li><a href="#">Category Title</a></li>
                        <li><a href="#">Category Title</a></li>
                        <li><a href="#">Category Title</a></li>
                        <li><a href="#">Category Title</a></li>
                        <li><a href="#">Category Title</a></li>
                        <li><a href="#">Category Title</a></li>
                    </ul>
                </div>
            </div>
            <!-- body left section ends here -->
            <!-- body middle section starts here -->
            <div class="col-md-7 profile_middle_part_outline">
            	<div class="post_project_body_outline">
                	<h2 class="post_project_top_heading">Post Your Job</h2>
                	<p class="post_project_top_para">Describe the job or list the skills you're looking for.</p>
                    <form role="form">
                    	<div class="form-group pp_form_group">
                        	<label class="pp_form_label">Project Title</label>
                            <input type="text" class="form-control col-md-6 pp_form_textbox"/>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group pp_form_group">
                        	<label class="pp_form_label">Describe It</label>
                            <textarea rows="6" class="form-control pp_form_textarea"></textarea>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group pp_form_group">
                        	<label class="pp_form_label">Select the category</label>
                            <div>
                                <select class="form-control pp_form_selectbox pull-left">
                                    <option>Category 1</option>
                                    <option>Category 2</option>
                                    <option>Category 3</option>
                                    <option>Category 4</option>
                                    <option>Category 5</option>
                                </select>
                                <select class="form-control pp_form_selectbox pull-left">
                                    <option>Sub Category 1</option>
                                    <option>Sub Category 2</option>
                                    <option>Sub Category 3</option>
                                    <option>Sub Category 4</option>
                                    <option>Sub Category 5</option>
                                </select>
                            	<div class="clearfix"></div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group pp_form_group">
                        	<label class="pp_form_label">Request specific skills or groups</label>
                            <select class="form-control pp_form_multiple_selectbox" multiple="multiple">
                                <option>Skills 1</option>
                                <option>Skills 2</option>
                                <option>Skills 3</option>
                                <option>Skills 4</option>
                                <option>Skills 5</option>
                                <option>Skills 1</option>
                                <option>Skills 2</option>
                                <option>Skills 3</option>
                                <option>Skills 4</option>
                                <option>Skills 5</option>
                            </select>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group pp_form_group">
                        	<label class="pp_form_label">Set work arrangement</label>
                            <div>
                                <select class="form-control pp_form_selectbox pull-left">
                                    <option>Hourly</option>
                                    <option>Fixed</option>
                                </select>
                                <select class="form-control pp_form_selectbox pull-left">
                                    <option>-- select hourly rate --</option>
                                    <option>Sub Category 2</option>
                                    <option>Sub Category 3</option>
                                    <option>Sub Category 4</option>
                                    <option>Sub Category 5</option>
                                </select>
                            	<div class="clearfix"></div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group pp_form_group">
                            <input type="submit" class="btn btn-success btn-lg" value="SUBMIT"/>
                            <div class="clearfix"></div>
                        </div>
                        <div class="clearfix"></div>
                    </form>
                    <div class="clearfix"></div>
                </div>
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
