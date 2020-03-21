function validateForm() {

	var email = document.getElementById("username").value;
	var passwrod = document.getElementById("pass").value;
	
	if (email == "admin" && passwrod == "123") {

		$(document).ready(function(){

			$("#myalert").show();
			setTimeout(function(){
				$("#myalert").hide();
			},1000);


			setTimeout(function(){
				window.open("../Index.php");
			},2000);





		});



	}else{

		$("#alertdanger").show();

			setTimeout(function(){
				$("#alertdanger").hide();
			},2000);


			
	}
	
}


