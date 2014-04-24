// JavaScript Document
/*
	Vyrazu Labs
	Author: Dipanjan Bagchi
	Email: dipanjan@vyrazu.com
*/

//method for ajax call from UI form
function sendingRequest(sendingData,returningPlace){
	$.ajax({
		type: "POST",
		url:"v-includes/class.fetchData.php",
		data: sendingData,
		beforeSend:function(){
			// this is where we append a loading image
			$('').html('');
		  },
		success:function(result){
			console.log(result);
			$(returningPlace).html(result);
			return false;
	}});
}

//selecting the email id from textbox
$(document).ready(function(e) {
    $('#signup_email_id').change(function() {
		var email_id = $('#signup_email_id').val();
		sendingData = 'email='+email_id+'&refData=emailChecking';
		$('#err_signup_email_id').css('display','block');
		//calling ajax function
		$.ajax({
			type: "POST",
			url:"v-includes/class.fetchData.php",
			data: sendingData,
			beforeSend:function(){
				// this is where we append a loading image
				$('').html('');
			  },
			success:function(result){
				if(result == 1)
				{
					$('#err_signup_email_id').html('**Email Id Already Exists');
					$('#signup_email_id').val('');
					$('#signup_email_id').focus(function() { 
						$('#err_signup_email_id').fadeOut(500);
					});
					
				}
				return false;
		}});
	});
	
	$('#signup_username').change(function() {
		var username = $('#signup_username').val();
		sendingData = 'username='+username+'&refData=usernameChecking';
		$('#err_signup_username').css('display','block');
		//calling ajax function
		$.ajax({
			type: "POST",
			url:"v-includes/class.fetchData.php",
			data: sendingData,
			beforeSend:function(){
				// this is where we append a loading image
				$('').html('');
			  },
			success:function(result){
				if(result == 1)
				{
					$('#err_signup_username').html('**Username Already Exists');
					$('#signup_username').val('');
					$('#signup_username').focus(function() { 
						$('#err_signup_username').fadeOut(500);
					});
				}
				return false;
		}});
	});
	
	//checking for password character lenght
	$('#signup_password').change(function(e) {
        var pasLen = $(this).val().length;
		//alert(pasLen);
		if(pasLen < 6)
		{
			$('#err_signup_password').html('**Password Must Have Minimum 6 Characters');
			$('#signup_password').val('');
			$('#signup_password').focus(function(e) {
                $('#err_signup_password').fadeOut(500);
            });
			return false;
		}
    });
	
	//getting project sub category
	$('#pro_category').change(function(e) {
        var cat = $(this).val();
		sendingData = 'category='+cat+'&refData=gettingSubCategory';
		
		//calling ajax function
		$.ajax({
			type: "POST",
			url:"v-includes/class.fetchData.php",
			data: sendingData,
			beforeSend:function(){
				// this is where we append a loading image
				$('').html('');
			  },
			success:function(result){
				$('#pro_sub_category').fadeIn(500);
				$('#pro_sub_category').html(result);
				return false;
		}});
    });
	
	//setting work type for post project
	$('#pp_work_type').change(function(e) {
        var work_type = $(this).val();
		//checking for not null value
		if(work_type != null)
		{
			sendingData = 'work_type='+work_type+'&refData=gettingWorkTypeDetails';
			//calling ajax function
			$.ajax({
				type: "POST",
				url:"v-includes/class.fetchData.php",
				data: sendingData,
				beforeSend:function(){
					// this is where we append a loading image
					$('').html('');
				  },
				success:function(result){
					$('#pp_form_work_type').html(result);
					return false;
			}});
		}
    });
	
	/*
		method for showing the custom price range in post project form 
		Auth: Dipanjan
	*/
	
	$(document).on("change", "#hourly_rate_list", function(){
		if($(this).val() == 'custom_price_hourly')
		{
			$('#pp_hourly_manual_rate').css('display','block');
		}
		else
		{
			$('#pp_hourly_manual_rate').css('display','none');
		}
	});
	
	$(document).on("change", "#fixed_rate_list", function(){
		if($(this).val() == 'custom_price_fixed')
		{
			$('#pp_fixed_manual_rate').css('display','block');
		}
		else
		{
			$('#pp_fixed_manual_rate').css('display','none');
		}
	});
	
});