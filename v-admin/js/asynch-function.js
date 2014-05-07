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

//selecting the values to fetch the member list
$(document).ready(function(e) {
	$('#user_search').click(function(e) {
        var search_value = $('#search_value').val();
		var search_column = $('#search_column').val();
		
		//redirect to this page
		window.location.href = 'user-list.php?search_value='+search_value+'&search_column='+search_column;
    });
	
});