$(document).ready(function() {

	var time  = {year:'2015',month:'07',day:'25'};
	var dateOne = new Date(time.month+'/'+time.day+'/'+time.year);

    $('#counter').countdown(time.year+'/'+time.month+'/'+time.day, function(event) {

      	var diffDays = parseInt((dateOne-(new Date())) / (1000 * 60 * 60 * 24));   
      	if(event.strftime('%m') == 0){
      		 
      		 $(this).html(event.strftime('%m/'+diffDays+'/%H:%M:%S'));

      		}else{

      			 $(this).html(event.strftime('%m/%d/%H:%M:%S'));
      		}
       
    });

});