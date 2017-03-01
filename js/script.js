window.onload = (function(){

	
	$("body").delegate(".check","click",function(event){
		
		event.preventDefault(); // avoid page to refresh itself
		var cityValue = document.getElementById("city").value;//get celsious value by ID
      alert(cityValue);
		$.ajax({
   			url: "php/server.php",
   			method: "POST",
   			data: {city:cityValue},
   			success: function(data){
   				$(".result").html(data);
   			} 
   		});//end ajax
	}); //end
})
