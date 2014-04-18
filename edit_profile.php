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
        	
            <!-- body middle section starts here -->
            
            <div class="col-md-10 profile_middle_part_outline">
            	<div class="post_project_body_outline">
            		<h2 class="post_project_top_heading">Edit Profile</h2>
                	
                	<!-- form panel -->
                		
                		<div class="panel-group" id="accordion">
                          <div class="panel panel-default">
                            <div class="panel-heading">
                              <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class="text-head-link">
                                    PERSONAL INFORMATION
                                </a>
                              </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in">
                              <div class="panel-body">
                                    
                                    <form class="form-horizontal" role="form">
                                          <div class="form-group">
                                            <label class="col-md-3 pp_form_label control-label">First Name</label>
                                            <div class="col-md-8">
                                              <input type="text" class="form-control pp_form_textbox" placeholder="First Name">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="col-md-3 pp_form_label control-label">Last Name</label>
                                            <div class="col-md-8">
                                              <input type="text" class="form-control pp_form_textbox" placeholder="Last Name">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="col-md-3 pp_form_label control-label">Gender</label>
                                            <div class="col-md-8">
                                              <div class="col-md-2"><input type="radio"  name="gender" value="male">Male</div>
                                              <div class="col-md-2"><input type="radio"  name="gender" value="female">Female</div>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="col-md-3 pp_form_label control-label">Date of Birth</label>
                                            <div class="col-md-8">
                                              <input type="date" class="form-control pp_form_textbox" name="dob" placeholder="Date of Birth">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="col-md-3 pp_form_label control-label">Contact No.</label>
                                            <div class="col-md-4">
                                              <input type="text" class="form-control pp_form_textbox" name="contact" placeholder="Contact No.">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="col-md-3 pp_form_label control-label">Address Line 1</label>
                                            <div class="col-md-8">
                                              <input type="text" class="form-control pp_form_textbox" name="add1" placeholder="Address Line 1">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="col-md-3 pp_form_label control-label">Address Line 2</label>
                                            <div class="col-md-8">
                                              <input type="text" class="form-control pp_form_textbox" name="add2" placeholder="Address Line 2">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="col-md-3 pp_form_label control-label">Pincode</label>
                                            <div class="col-md-3">
                                              <input type="text" class="form-control pp_form_textbox" name="pin" placeholder="Pincode">
                                            </div>
                                            <label class="col-md-2 pp_form_label control-label">City</label>
                                            <div class="col-md-3">
                                              <input type="text" class="form-control pp_form_textbox" name="city" placeholder="City">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="col-md-3 pp_form_label control-label">State</label>
                                            <div class="col-md-3">
                                              <input type="text" class="form-control pp_form_textbox" name="state" placeholder="State">
                                            </div>
                                            <label class="col-md-2 pp_form_label control-label">Country</label>
                                            <div class="col-md-3">
                                              <input type="text" class="form-control pp_form_textbox" name="country" placeholder="Country">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <div class="col-md-offset-3 col-md-8">
                                              <button type="submit" class="btn btn-success ">SAVE</button>
                                            </div>
                                          </div>
                                    </form>
                                    
                              </div>
                            </div>
                          </div>
                          <div class="panel panel-default">
                            <div class="panel-heading">
                              <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" class="text-head-link">
                                        IMAGES
                                </a>
                              </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse">
                              <div class="panel-body">
                                
                                <form class="form-horizontal" role="form">
                                          <div class="form-group">
                                            <label class="col-md-3 pp_form_label control-label">Profile Image</label>
                                            <div class="col-md-8">
                                              <input type="file" class="form-control pp_form_textbox pp_form_file_upload">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <div class="col-md-offset-3 col-md-4">
                                              <img src="img/profile_image.png" />
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="col-md-3 pp_form_label control-label">Cover Image</label>
                                            <div class="col-md-8">
                                              <input type="file" class="form-control pp_form_textbox pp_form_file_upload">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <div class="col-md-offset-3 col-md-8">
                                              <img src="img/cover_image.png" />
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <div class="col-md-offset-3 col-md-8">
                                              <button type="submit" class="btn btn-success ">SAVE</button>
                                            </div>
                                          </div>
                                    </form>
                                
                              </div>
                            </div>
                          </div>
                          <div class="panel panel-default">
                            <div class="panel-heading">
                              <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" class="text-head-link">
                                    PROFILE INFO
                                </a>
                              </h4>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse">
                              <div class="panel-body">
                                    
                                <form class="form-horizontal" role="form">
                                          <div class="form-group">
                                            <label class="col-md-3 pp_form_label control-label">Skills</label>
                                            <div class="col-md-8">
                                              <input type="text" class="form-control pp_form_textbox" readonly>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <div class="col-md-offset-3 col-md-8">
                                                    <div class="form-control pp_form_textbox col-md-4 scrollable-content">
                                                        <label class="checkbox col-md-4">
                                                          <input type="checkbox"  value="Skill1"> Skill1
                                                        </label>
                                                        <label class="checkbox col-md-4">
                                                          <input type="checkbox"  value="Skill2"> Skill2
                                                        </label>
                                                        <label class="checkbox col-md-4">
                                                          <input type="checkbox"  value="Skill3"> Skill3
                                                        </label>
                                                        <label class="checkbox col-md-4">
                                                          <input type="checkbox"  value="Skill1"> Skill1
                                                        </label>
                                                        <label class="checkbox col-md-4">
                                                          <input type="checkbox"  value="Skill2"> Skill2
                                                        </label>
                                                        <label class="checkbox col-md-4">
                                                          <input type="checkbox"  value="Skill3"> Skill3
                                                        </label>
                                                        <label class="checkbox col-md-4">
                                                          <input type="checkbox"  value="Skill1"> Skill1
                                                        </label>
                                                        <label class="checkbox col-md-4">
                                                          <input type="checkbox"  value="Skill2"> Skill2
                                                        </label>
                                                        <label class="checkbox col-md-4">
                                                          <input type="checkbox"  value="Skill3"> Skill3
                                                        </label>
                                                        <label class="checkbox col-md-4">
                                                          <input type="checkbox"  value="Skill1"> Skill1
                                                        </label>
                                                        <label class="checkbox col-md-4">
                                                          <input type="checkbox"  value="Skill2"> Skill2
                                                        </label>
                                                        <label class="checkbox col-md-4">
                                                          <input type="checkbox"  value="Skill3"> Skill3
                                                        </label>
                                                        <label class="checkbox col-md-4">
                                                          <input type="checkbox"  value="Skill1"> Skill1
                                                        </label>
                                                        <label class="checkbox col-md-4">
                                                          <input type="checkbox"  value="Skill2"> Skill2
                                                        </label>
                                                        <label class="checkbox col-md-4">
                                                          <input type="checkbox"  value="Skill3"> Skill3
                                                        </label>
                                                        <label class="checkbox col-md-4">
                                                          <input type="checkbox"  value="Skill1"> Skill1
                                                        </label>
                                                        <label class="checkbox col-md-4">
                                                          <input type="checkbox"  value="Skill2"> Skill2
                                                        </label>
                                                        <label class="checkbox col-md-4">
                                                          <input type="checkbox"  value="Skill3"> Skill3
                                                        </label>
                                                        <label class="checkbox col-md-4">
                                                          <input type="checkbox"  value="Skill1"> Skill1
                                                        </label>
                                                        <label class="checkbox col-md-4">
                                                          <input type="checkbox"  value="Skill2"> Skill2
                                                        </label>
                                                        <label class="checkbox col-md-4">
                                                          <input type="checkbox"  value="Skill3"> Skill3
                                                        </label>
                                                        <label class="checkbox col-md-4">
                                                          <input type="checkbox"  value="Skill1"> Skill1
                                                        </label>
                                                        <label class="checkbox col-md-4">
                                                          <input type="checkbox"  value="Skill2"> Skill2
                                                        </label>
                                                        <label class="checkbox col-md-4">
                                                          <input type="checkbox"  value="Skill3"> Skill3
                                                        </label>
                                                        <label class="checkbox col-md-4">
                                                          <input type="checkbox"  value="Skill1"> Skill1
                                                        </label>
                                                        <label class="checkbox col-md-4">
                                                          <input type="checkbox"  value="Skill2"> Skill2
                                                        </label>
                                                        <label class="checkbox col-md-4">
                                                          <input type="checkbox"  value="Skill3"> Skill3
                                                        </label>
                                                        <label class="checkbox col-md-4">
                                                          <input type="checkbox"  value="Skill1"> Skill1
                                                        </label>
                                                        <label class="checkbox col-md-4">
                                                          <input type="checkbox"  value="Skill2"> Skill2
                                                        </label>
                                                        <label class="checkbox col-md-4">
                                                          <input type="checkbox"  value="Skill3"> Skill3
                                                        </label>
                                                        <label class="checkbox col-md-4">
                                                          <input type="checkbox"  value="Skill1"> Skill1
                                                        </label>
                                                        <label class="checkbox col-md-4">
                                                          <input type="checkbox"  value="Skill2"> Skill2
                                                        </label>
                                                        <label class="checkbox col-md-4">
                                                          <input type="checkbox"  value="Skill3"> Skill3
                                                        </label>
                                                        <label class="checkbox col-md-4">
                                                          <input type="checkbox"  value="Skill1"> Skill1
                                                        </label>
                                                        <label class="checkbox col-md-4">
                                                          <input type="checkbox"  value="Skill2"> Skill2
                                                        </label>
                                                        <label class="checkbox col-md-4">
                                                          <input type="checkbox"  value="Skill3"> Skill3
                                                        </label>
                                                    </div>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="col-md-3 pp_form_label control-label">Terms</label>
                                            <div class="col-md-8">
                                              <input type="text" class="form-control pp_form_textbox">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="col-md-3 pp_form_label control-label">Availability</label>
                                            <div class="col-md-8">
                                              <input type="text" class="form-control pp_form_textbox">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="col-md-3 pp_form_label control-label">Interested Topics</label>
                                            <div class="col-md-8">
                                              <input type="text" class="form-control pp_form_textbox">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="col-md-3 pp_form_label control-label">Profile Description</label>
                                            <div class="col-md-8">
                                              <input type="text" class="form-control pp_form_textbox">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <div class="col-md-offset-3 col-md-8">
                                              <button type="submit" class="btn btn-success ">SAVE</button>
                                            </div>
                                          </div>
                                </form>
                                    
                              </div>
                            </div>
                          </div>
                          <div class="panel panel-default">
                            <div class="panel-heading">
                              <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapsefour" class="text-head-link">
                                    PORTFOLIO
                                </a>
                              </h4>
                            </div>
                            <div id="collapsefour" class="panel-collapse collapse">
                              <div class="panel-body">
                                    <form class="form-horizontal" role="form">
                                        <div class="form-group">
                                                <label class="col-md-3 pp_form_label control-label">File</label>
                                                <div class="col-md-8">
                                                  <input type="file" class="form-control pp_form_textbox pp_form_file_upload">
                                                </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 pp_form_label control-label">Skills Required</label>
                                            <div class="col-md-8">
                                              <input type="text" class="form-control pp_form_textbox">
                                            </div>
                                          </div>
                                        <div class="form-group">
                                                <label class="col-md-3 pp_form_label control-label">Description</label>
                                                <div class="col-md-8">
                                                  <textarea class="form-control pp_form_textbox pp_text_area"></textarea>
                                                </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-offset-3 col-md-8">
                                              <button type="submit" class="btn btn-success ">SAVE</button>
                                            </div>
                                          </div>
                                    </form>
                              </div>
                            </div>
                          </div>
                          <div class="panel panel-default">
                            <div class="panel-heading">
                              <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapsefive" class="text-head-link">
                                    EMPLOYMENT
                                </a>
                              </h4>
                            </div>
                            <div id="collapsefive" class="panel-collapse collapse">
                              <div class="panel-body">
                                    <form class="form-horizontal" role="form">
                                        <div class="form-group">
                                                <label class="col-md-3 pp_form_label control-label">Company Name</label>
                                                <div class="col-md-8">
                                                  <input type="text" class="form-control pp_form_textbox">
                                                </div>
                                        </div>
                                        <div class="form-group">
                                                <label class="col-md-3 pp_form_label control-label">Position</label>
                                                <div class="col-md-8">
                                                  <input type="text" class="form-control pp_form_textbox">
                                                </div>
                                        </div>
                                        <div class="form-group">
                                                <label class="col-md-3 pp_form_label control-label">Start Date</label>
                                                <div class="col-md-4">
                                                    <input type="date" class="form-control pp_form_textbox">
                                                </div>
                                        </div>
                                        <div class="form-group">
                                               <label class="col-md-3 pp_form_label control-label">End Date</label>
                                                <div class="col-md-4">
                                                    <input type="date" class="form-control pp_form_textbox">
                                                </div>
                                        </div>
                                        <div class="form-group">
                                                <label class="col-md-3 pp_form_label control-label">Descrition</label>
                                                <div class="col-md-8">
                                                  <textarea class="form-control pp_form_textbox pp_text_area"></textarea>
                                                </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-offset-3 col-md-8">
                                              <button type="submit" class="btn btn-success">SAVE</button>
                                              <button type="submit" class="btn btn-primary">ADD ANOTHER</button>
                                            </div>
                                          </div>
                                    </form>
                              </div>
                            </div>
                          </div>
                          
                          <div class="panel panel-default">
                            <div class="panel-heading">
                              <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseseven" class="text-head-link">
                                    EDUCATION
                                </a>
                              </h4>
                            </div>
                            <div id="collapseseven" class="panel-collapse collapse">
                              <div class="panel-body">
                                    <form class="form-horizontal" role="form">
                                        <div class="form-group">
                                                <label class="col-md-3 pp_form_label control-label">Institution Name</label>
                                                <div class="col-md-8">
                                                  <input type="text" class="form-control pp_form_textbox">
                                                </div>
                                        </div>
                                        <div class="form-group">
                                                <label class="col-md-3 pp_form_label control-label">Degree</label>
                                                <div class="col-md-8">
                                                  <input type="text" class="form-control pp_form_textbox">
                                                </div>
                                        </div>
                                        <div class="form-group">
                                                <label class="col-md-3 pp_form_label control-label">Start Date</label>
                                                <div class="col-md-4">
                                                    <input type="date" class="form-control pp_form_textbox">
                                                </div>
                                        </div>
                                        <div class="form-group">
                                               <label class="col-md-3 pp_form_label control-label">End Date</label>
                                                <div class="col-md-4">
                                                    <input type="date" class="form-control pp_form_textbox">
                                                </div>
                                        </div>
                                        <div class="form-group">
                                                <label class="col-md-3 pp_form_label control-label">Descrition</label>
                                                <div class="col-md-8">
                                                  <textarea class="form-control pp_form_textbox pp_text_area"></textarea>
                                                </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-offset-3 col-md-8">
                                              <button type="submit" class="btn btn-success">SAVE</button>
                                              <button type="submit" class="btn btn-primary">ADD ANOTHER</button>
                                            </div>
                                          </div>
                                    </form>
                              </div>
                            </div>
                          </div>
											  
						</div>
                		
                	<!-- form panel ends -->
                	
             	</div><!-- post project body outline -->
            </div><!-- profile mid part outline -->
            
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
