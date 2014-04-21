// JavaScript Document
//for form validation author DIPANJAN
//function for form validations
function validateRequiredField(id_name,err_id)
{
	var x = document.getElementById(id_name).value;
	if(x == "")
	{
		//make the background color red
		document.getElementById(id_name).style.backgroundColor = '#F6D3D3';
		//showing the msg
		document.getElementById(err_id).innerHTML = '**Please Fill Up The Field';
		document.getElementById(err_id).style.color = 'red';
		result = 0;
		//document.getElementById('btn_submit').disabled = 'true';
		exit();
	}
	else
	{
		//make the background color normal if valid
		document.getElementById(id_name).style.backgroundColor = '#ffffff';
		result = 1;
	}
}
//function for checking valid email
function validateEmail(id_name)
{
	var textbx = document.getElementById(id_name);
	var input_value = document.getElementById(id_name).value;
	//check the field is empty
	if(input_value == "")
	{
		textbx.style.backgroundColor = '#F6D3D3';
		result = 0;
	}
	//If not empty then check for email validation
	else
	{
		var x=input_value;
		var atpos=x.indexOf("@");
		var dotpos=x.lastIndexOf(".");
		if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
		{
			alert("Invalid Email");
			textbx.style.backgroundColor = '#F6D3D3';
			result = 0;
  		}
		else
		{
			textbx.style.backgroundColor = '#ffffff';
			result = 1;
		}
	}
}

//function for checkbox validiation
function validiateSelectbox(id_name,err_id){
	var check = document.getElementById(id_name).checked;
	
	if(check == false)
	{
		document.getElementById(err_id).innerHTML = '**Please Select The Select Box';
		document.getElementById(err_id).style.color = 'red';
		exit();
	}
}
//function for validiation of radiobutton
function validiateRadio(radio1,radio2,err_id){
	var radio_button1 = document.getElementById(radio1).checked;
	var radio_button2 = document.getElementById(radio2).checked;
	
	if(radio_button1 == false && radio_button2 == false)
	{
		document.getElementById(err_id).innerHTML = '**Please Select One Option';
		document.getElementById(err_id).style.color = 'red';
		exit();
	}
}

function checkResult(err_id)
{
	if(result == 0)
	{
		//alert('Please check '+alert_value);
		document.getElementById(err_id).innerHTML = '**Please Fill Up The Field';
		document.getElementById(err_id).style.color = 'red';
		//document.getElementById('btn_submit').disabled = 'true';
		exit();
	}
}
function checkResultEmail(err_id)
{
	if(result == 0)
	{
		//alert('Please check '+alert_value);
		document.getElementById(err_id).innerHTML = '**Please Fill Up The Field';
		document.getElementById(err_id).style.color = 'red';
		//document.getElementById('btn_submit').disabled = 'true';
		return 0;
	}
	else
	{
		return 1;
	}
}
function checkEmptyField(id_name_1)
{
	var y = document.getElementById(id_name_1).value;
	if(y == null || y == "")
	{
		document.getElementById(id_name_1).style.backgroundColor = "#000";
		document.getElementById('btn_submit').disabled = 'true';
		exit(); 
	}
}
function validateSignupForm(form_name)
{
	validateEmail('signup_email_id');
	checkResult('err_signup_email_id');
	validateRequiredField('signup_username','err_signup_username');
	validateRequiredField('signup_password','err_signup_password');
	validateRequiredField('signup_con_password','err_signup_con_password');
	validiateRadio('signup_employer','signup_contractor','err_signup_category');
	validiateSelectbox('signup_terms','err_signup_terms');
	//submit the contact form
	document.getElementById(form_name).submit();
}

//login form validiation
function validateLoginForm(form_name)
{
	validiateRadio('login_employer','login_contractor','err_login_radio');
	//submit the contact form
	document.getElementById(form_name).submit();
}

function validateProjectPostForm(form_name)
{
	validateRequiredField('err_postProject_category','postProject_category');
	validateRequiredField('postProject_name','err_postProject_name');
	validateRequiredField('postProject_description','err_postProject_description');
	validateRequiredField('postProject_skills','err_postProject_skills');
	validateRequiredField('postProject_price','err_postProject_price');
	//submit the contact form
	document.getElementById(form_name).submit();
}

/*
	method for alert warning message
	Auth: Dipanjan
*/

function alertWarning(msg) {
    document.getElementById('warning_msg').innerHTML = '<b>' +msg+ '</b>';
	document.getElementById('warning_msg').style.display = 'block';
	var body = $("body");
	body.animate({scrollTop:0}, '500');
	setInterval('$( "#warning_msg" ).hide()', 3000);
}

/*
	method for alert success message
	Auth: Dipanjan
*/

function alertSuccess(msg){
	document.getElementById('success_msg').innerHTML = '<b>' +msg+ '</b>';
	document.getElementById('success_msg').style.display = 'block';
	var body = $("body");
	body.animate({scrollTop:0}, '500');
	setInterval('$( "#success_msg" ).hide()', 3000);
}

$(document).ready(function(e) {
    /*
		method for preview profile pic and cover pic
		Auth: Dipanjan
	*/
	$('#pro_pic').change(function() {
		var file = $(this).get(0).files[0];
		var img = document.createElement('img');
		img.src = window.URL.createObjectURL(file);
		$('#pro_pic_preview').html(img);
		var reader = new FileReader();
		reader.onload = function(e) {
			window.URL.revokeObjectURL(this.src);
		}
		//reader.readAsDataURL(file);
		//$('#pro_pic_preview img').css({'width':'200px'});
		
		var data = new FormData($('#image_info')[0]);
	});
	
	$('#cov_pic').change(function() {
		var file = $(this).get(0).files[0];
		var img = document.createElement('img');
		img.src = window.URL.createObjectURL(file);
		$('#cov_pic_preview').html(img);
		var reader = new FileReader();
		reader.onload = function(e) {
			window.URL.revokeObjectURL(this.src);
		}
		//reader.readAsDataURL(file);
		//$('#pro_pic_preview img').css({'width':'200px'});
		
		var data = new FormData($('#image_info')[0]);
	});
	
	/*
		method for showing select skills on textbox
		Auth: Dipanjan
	*/
	$('.skills_checkbox').click(function(e) {
		var skillName = $(this).val();
		//getting the skills textbox value
		//var skillsValue = $('#skills_value').val();
		var skillsValue = $('#skills_list_value').html();
		//checking for checkbox is checked or not
		var checkingStatus = $(this).is(':checked');
		if(checkingStatus == true)
		{
			//checking for skills textbox is empty or not
			/*if(skillsValue.length == 0)
			{
				//adding the value to the textbox
				$('#skills_value').val(skillName);
			}
			else
			{
				//adding the value to the textbox
				$('#skills_value').val(skillsValue+','+skillName);
			}*/
			//the html which will added
			var addingHtml = '<div class="myskills_box pull-left">'+skillName+'</div>';
			$('#skills_list_value').append(addingHtml);
		}
		else if(checkingStatus == false)
		{
			//checking for there is ',' in the value or not
			/*if(skillsValue.indexOf(',') == -1)
			{
				//removing the value of textbox
				$('#skills_value').val('');
			}
			else
			{
				//removing checkbox value of textbox
				var newSkillValue = skillsValue.replace(skillName+',','');
				$('#skills_value').val(newSkillValue);
			}*/
			//the html which will deleted
			var addingHtml = '<div class="myskills_box pull-left">'+skillName+'</div>';
			var newSkillValue = skillsValue.replace(addingHtml,'');
			$('#skills_list_value').html(newSkillValue);
		}
    });
	
});



	
