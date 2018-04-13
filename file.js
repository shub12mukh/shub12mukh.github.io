		//For Modal LogIn
		$(document).ready(function(){
			$("#loginIdSelector").click(function(){
				$("#myModalLoginForm").modal('show');
			});
		});
		
		//For Modal LogIn from Carousel
		$(document).ready(function(){
			$("#loginIdSelectorfromCarousel").click(function(){
				$("#myModalLoginForm").modal('show');
			});
		});
		

		//For Modal SignUp
		$(document).ready(function(){
			$("#signIdSelector").click(function(){
				$("#myModalSigninForm").modal('show');
			});
		});
		
		
		
		//For Modal SignUp from Carousel
		$(document).ready(function(){
			$("#signUpSelectorfromCarousel").click(function(){
				$("#myModalSigninForm").modal('show');
			});
		});

		//For Modal SignUp from LogIn Modal
		$(document).ready(function(){
			$("#signUpSelectorFromLogIn").click(function(){
				$("#myModalSigninForm").modal('show');
				$("#myModalLoginForm").modal('hide');
			});
		});
		
		//For Modal City List
		$(document).ready(function(){
			$("#selectCity").click(function(){
				console.log("hello");
			});
		});
		
		//For LogIn Validation
		/*
		$(document).ready(function(){
			$("#login").click(function(){
				var x = $("#loginEmail");
				var re = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
				var is_email=re.test(x.val());
				if(is_email == false){
				$("#loginEmail").popover('show');
				}
			});
		});
		*/
		

		//For SignUp
		//Preventing the form from getting submitted if Email is not valid:-
		$(document).ready(function() {
            $("#signupform").submit(function(e){
				var x = $("#signupEmail");
				var re = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
				var is_email=re.test(x.val());
				if(is_email == false){
                $("#signupEmail").popover('show');
                e.preventDefault(e);
				}
            });
        });
		
		//For CityList Modal
		$(document).ready(function(){
				$("#selectCity").click(function(){
					$("#cityListModal").modal('show');
				});
		});
		
		
		
		
